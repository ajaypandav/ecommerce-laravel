<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\CartController;
use DB;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('customerLogin')) {
                return redirect('myaccount')->send();
            }
            return $next($request);
        });
    }

    public function login()
    {
        return view('front.login');
    }

    public function postLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $email    = $request->input('email');
        $password = $request->input('password');

        $customer = Customer::where('email', '=', $email)->first();

        if (!$customer) {
            return redirect()->back()->with('error', 'This email is not registered with us.')->withInput();
        } elseif (!Hash::check($password, $customer->password)) {
            return redirect()->back()->with('error', 'Invalid password')->withInput();
        } else {
            $cartData = CartController::getCartData();

            if (!empty($cartData)) {
                foreach ($cartData as $key => $value) {
                    DB::table('cart')->where('id', $value->id)->update(['cid' => $customer->id]);
                }
            }

            $request->session()->put('customerLogin', 'true');
            $request->session()->put('customer', $customer);
            return redirect('/');
        }
    }

    public function register()
    {
        return view('front.register');
    }

    public function postRegister(Request $request)
    {
        $request->validate([
            'firstname'  => 'required|max:255',
            'middlename' => 'max:255',
            'lastname'   => 'required|max:255',
            'email'      => 'required|unique:customers|max:255',
            'password'   => 'required|max:255',
            'passagain'  => 'required|max:255',
        ]);

        $customer = request()->all();

        $customer['password'] = Hash::make($customer['password']);

        Customer::create($customer);

        return redirect('login')->with('success', 'You have Successfully Registered. Please login to access you account.');
    }
}
