<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

// use Vinkla\Instagram\Instagram;

class IndexController extends Controller
{
    public function index()
    {
        $data = array();
        // Get banners data
        $banners = DB::table('banners')->where('status', 1)->orderBy('position', 'ASC')->get();

        $data['banners'] = $banners;

        // Get Featured products
        $featured = DB::table('products')->where('status', 1)->where('is_featured', 1)->where('stock', '>', 0)->orderBy('id', 'DESC')->get()->toArray();

        $data['featured'] = $featured;

        // Get blog data
        $blogs = DB::table('blogs')->where('status', 1)->orderBy('created_at', 'DESC')->limit(3)->get()->toArray();

        $data['blogs'] = $blogs;

        // Get instagram images
        // $instagram = new Instagram('6629624361.00e0200.e148f866d51447068dcf40e28f4cde86');

        // $instaImages = $instagram->media(['count' => 5]);

        // $data['instaImages'] = $instaImages;

        return view('front.index')->with($data);
    }

    public function subscribe(Request $request)
    {
        if (!empty($request->email)) {
            $email = $request->email;

            $checkEmail = DB::table('subscribers')->select('id')->where('email', $email)->first();
            if (!empty($checkEmail->id)) {
                return 'exist';
            } else {
                $values = array(
                    'email'      => $email,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                );

                $id = DB::table('subscribers')->insertGetId($values);

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
}
