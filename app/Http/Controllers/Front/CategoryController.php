<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use DB;
use File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category($url, Request $request)
    {
        $category = DB::table('categories')->where('url', $url)->first();

        if (!empty($category->id)) {

            $cid = $category->id;

            // Get min and max price
            $minPrice = DB::table('products')
                ->where('cid', $cid)
                ->where('status', 1)
                ->min('price');

            $maxPrice = DB::table('products')
                ->where('cid', $cid)
                ->where('status', 1)
                ->max('price');

            $rangeStart = $minPrice;
            $rangeEnd   = $maxPrice;

            if (!empty($request->sort)) {
                $products = DB::table('products')
                    ->where('cid', $cid)
                    ->where('status', 1)
                    ->orderBy('price', $request->sort)
                    ->paginate(12);
            } elseif (!empty($request->min) && !empty($request->max)) {
                $products = DB::table('products')
                    ->where('cid', $cid)
                    ->where('status', 1)
                    ->where('price', '>=', $request->min)
                    ->where('price', '<=', $request->max)
                    ->orderBy('price', 'asc')
                    ->paginate(12);

                $rangeStart = $request->min;
                $rangeEnd   = $request->max;
            } else {
                $products = DB::table('products')
                    ->where('cid', $cid)
                    ->where('status', 1)
                    ->orderBy('id', 'desc')
                    ->paginate(12);
            }

            $image = public_path('/uploads/category/') . $category->image;

            if (!empty($category->image) && File::exists($image)) {
                $headerImage = url('/') . '/public/uploads/category/' . $category->image;
            } else {
                $headerImage = asset('front/images/category-default.jpg');
            }

            $data = [
                'category'     => $category,
                'header_image' => $headerImage,
                'products'     => $products,
                'min_price'    => $minPrice,
                'max_price'    => $maxPrice,
                'range_start'  => $rangeStart,
                'range_end'    => $rangeEnd,
                'request'      => $request,
            ];

            return view('front.category')->with($data);
        } else {
            return redirect('404');
        }
    }
}
