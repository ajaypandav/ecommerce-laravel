<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function add(Request $request)
    {
        if (isset($request->pid)) {
            $pid = $request->pid;

            if (session()->has('customer')) {
                $cid = session()->get('customer')->id;

                $data = array(
                    'cid' => $cid,
                    'pid' => $pid,
                );

                $check = Wishlist::where('cid', $cid)->where('pid', $pid)->first();

                if (!empty($check)) {
                    return 'exist';
                } else {
                    $insert = Wishlist::create($data);

                    if ($insert->id) {
                        return 'true';
                    } else {
                        return 'false';
                    }
                }
            } else {
                return 'not-logged-in';
            }
        } else {
            return false;
        }
    }
}
