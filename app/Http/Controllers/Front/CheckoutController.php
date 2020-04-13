<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\CartController;
use App\Order;
use DB;
use Hash;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        $data['cartData'] = CartController::getCartData();

        if (session()->has('customer')) {
            $customer = DB::table('customers')->where('id', session()->get('customer')->id)->first();

            $data['customer'] = $customer;
        }

        return view('front.checkout')->with($data);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'firstname'   => 'required|max:100',
            'lastname'    => 'required|max:100',
            'email'       => 'required|max:100',
            'mobileno'    => 'required|max:30',
            'address1'    => 'required|max:255',
            'address2'    => 'max:30',
            'zipcode'     => 'required|max:10',
            'city'        => 'required|max:100',
            'state'       => 'required|max:100',
            'country'     => 'required|max:100',
            'checkout_as' => 'max:100',
        ]);

        $data = $request->all();

        // Check checkout as
        if ($data['checkout_as'] == 'register') {
            // Check wether email exist or not
            $checkEmail = DB::table('customers')->where('email', $data['email'])->first();

            if (!empty($checkEmail->id)) {
                $request->flash();

                return redirect()->back()->with(['error' => 'This email is already registered. Please use another one or login first!']);
            } else {
                $rData = array(
                    'firstname'  => $data['firstname'],
                    'lastname'   => $data['lastname'],
                    'email'      => $data['email'],
                    'password'   => Hash::make($data['password']),
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                );

                $cid         = DB::table('customers')->insertGetId($rData);
                $data['cid'] = $cid;
            }
        } elseif ($data['checkout_as'] == 'registered') {
            $data['cid'] = session()->get('customer')->id;
        }

        $data['order_id'] = date('ymdHis') . rand(99, 999);

        $order = Order::create($data);

        $oid = $order->id;

        $cartData = CartController::getCartData();

        foreach ($cartData as $cart) {
            $pro = array(
                'oid'        => $oid,
                'pid'        => $cart->pid,
                'qty'        => $cart->qty,
                'unit_price' => $cart->price,
            );

            // Insert into order products table
            DB::table('order_products')->insert($pro);

            // Delete from cart
            DB::table('cart')->where('id', $cart->id)->delete();
        }

        return redirect()->to('checkout/success');
    }

    public function success()
    {
        return view('front.checkout-success');
    }
}
