<?php

namespace App\Http\Controllers\Front;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Order;
use DB;
use Hash;
use Illuminate\Http\Request;
use Session;

class CustomerController extends Controller
{
    public function myaccount()
    {
        $id = session()->get('customer')->id;

        $customer = Customer::find($id);

        return view('front.myaccount')->with('customer', $customer);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email'      => 'required|unique:customers,email,' . $id,
            'firstname'  => 'required|max:255',
            'middlename' => 'max:255',
            'lastname'   => 'required|max:255',
        ]);

        $customer = request()->all();

        Customer::find($id)->update($customer);

        return redirect()->back()->with('success', 'Account information updated successfully !!');
    }

    public function changePassword()
    {
        $id = session()->get('customer')->id;

        $customer = Customer::find($id);

        return view('front.change-password')->with('customer', $customer);
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'curr_pass' => 'required|max:255',
            'new_pass'  => 'required|max:255',
            'conf_pass' => 'required|max:255',
        ]);

        $curr_pass = $request->input('curr_pass');
        $new_pass  = $request->input('new_pass');

        $customer = Customer::find($id);

        if (!Hash::check($curr_pass, $customer->password)) {
            return redirect()->back()->with('error', 'Current password does not match !!');
        } else {
            $data['password'] = Hash::make($new_pass);

            Customer::find($id)->update($data);

            return redirect()->back()->with('success', 'Password updated successfully !!');
        }
    }

    public function wishlist()
    {
        $cid = session()->get('customer')->id;

        $wishlistData = DB::table('wishlist')
            ->select('wishlist.*', 'products.product_name', 'products.price', 'products.url')
            ->leftJoin('products', 'products.id', '=', 'wishlist.pid')
            ->where('wishlist.cid', $cid)
            ->get()
            ->toArray();

        return view('front.wishlist')->with(['wishlistData' => $wishlistData]);
    }

    public function wishlistDelete($id)
    {
        DB::table('wishlist')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Product has been deleted from wishlist !');
    }

    public function orders()
    {
        $cid = session()->get('customer')->id;

        $orders = DB::table('orders')->where('cid', $cid)->orderBy('created_at', 'asc')->get()->toArray();

        return view('front.myorders')->with('orders', $orders);
    }

    public function orderDetail($id)
    {
        $order = Order::find($id);

        $orderPro = DB::table('order_products')
            ->select('order_products.*', 'products.product_name')
            ->leftJoin('products', 'products.id', '=', 'order_products.pid')
            ->where('order_products.oid', $id)->get();

        return view('front.orderDetail')->with(['order' => $order, 'products' => $orderPro]);
    }

    public function logout()
    {
        if (Session::has('userdata')) {
            session()->forget('userdata');
        }
        session()->forget(['customer', 'customerLogin']);
        if (!Session::has('customer')) {
            return redirect()->to('/');
        }
    }
}
