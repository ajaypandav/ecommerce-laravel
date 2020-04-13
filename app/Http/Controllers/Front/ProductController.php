<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use DB;

class ProductController extends Controller
{
    public function product($url)
    {
        $product = DB::table('products')->where('url', $url)->first();

        if (!empty($product->id)) {
            $category = DB::table('categories')->where('id', $product->cid)->first();

            $imagesData = DB::table('products_images')->where('pid', $product->id)->get()->toArray();

            if (!empty($imagesData)) {
                foreach ($imagesData as $key => $value) {
                    $images[] = (object) [
                        'thumbnail' => asset('uploads/products/thumbnail/' . $value->image),
                        'large'     => asset('uploads/products/large/' . $value->image),
                    ];
                }
            } else {
                $images[] = (object) [
                    'thumbnail' => asset('front/images/product-default.jpg'),
                    'large'     => asset('front/images/product-default.jpg'),
                ];
            }

            $images = (object) $images;

            $relatedPro = DB::table('products')->where('cid', $product->cid)->where('id', '<>', $product->id)->get()->toArray();

            $data = [
                'category'   => $category,
                'product'    => $product,
                'images'     => $images,
                'relatedPro' => $relatedPro,
            ];

            return view('front.product')->with($data);
        } else {
            return redirect('404');
        }
    }
}
