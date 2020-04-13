<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public static function getCartData()
    {
        if (Session::has('customer')) {
            $cid = session()->get('customer')->id;

            $cartData = DB::table('cart')
                ->select('cart.*', 'products.product_name', 'products.price', 'products.url')
                ->leftJoin('products', 'products.id', '=', 'cart.pid')
                ->where('cart.cid', $cid)
                ->get()
                ->toArray();
        } elseif (Session::has('userdata')) {
            $userdata = Session::get('userdata');

            $cartData = DB::table('cart')
                ->select('cart.*', 'products.product_name', 'products.price', 'products.url')
                ->leftJoin('products', 'products.id', '=', 'cart.pid')
                ->where('cart.userdata', $userdata)
                ->get()
                ->toArray();
        } else {
            $cartData = array();
        }

        return $cartData;
    }

    public function add(Request $request)
    {
        if (!empty($request->pid)) {
            $pid = $request->pid;

            if (!Session::has('userdata')) {
                $userData = time() . uniqid() . rand(9999, 99999);
                Session::put('userdata', $userData);
            } else {
                $userData = Session::get('userdata');
            }

            $checkCart = DB::table('cart')->select('id')->where('userdata', $userData)->where('pid', $pid)->first();
            if (!empty($checkCart->id)) {
                return 'exist';
            } else {
                $values = array(
                    'userdata'   => $userData,
                    'pid'        => $pid,
                    'qty'        => $request->qty,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                );

                if (session()->has('customer')) {
                    $values['cid'] = session()->get('customer')->id;
                }

                $id = DB::table('cart')->insertGetId($values);

                if ($id) {
                    return 'true';
                } else {
                    return 'false';
                }
            }
        } else {
            return 'false';
        }
    }

    public function delete($id)
    {
        $delete = DB::table('cart')->where('id', $id)->delete();

        if ($delete) {
            Session::flash('success', 'Item deleted from cart!');
            echo 'true';
        }
    }

    public function cart()
    {
        $cartData = $this->getCartData();

        return view('front.cart')->with(['cartData' => $cartData]);
    }

    public function update(Request $request)
    {
        $cart = request()->all();

        if (isset($cart['updateCart'])) {
            foreach ($cart['cartid'] as $key => $value) {
                DB::table('cart')->where('id', $value)->update(['qty' => $cart['qty'][$key]]);
            }

            return redirect()->back()->with('success', 'Cart updated successfully!');
        }
    }

    public function headerCart()
    {
        $cartData = $this->getCartData();

        return view('front.header-cart')->with(['cartData' => $cartData]);
    }
}
