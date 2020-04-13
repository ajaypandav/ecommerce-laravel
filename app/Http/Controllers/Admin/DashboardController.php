<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $banner   = DB::table('banners')->select(DB::raw('COUNT(id) AS total_banner'))->get();
        $category = DB::table('categories')->select(DB::raw('COUNT(id) AS total_category'))->get();
        $products = DB::table('products')->select(DB::raw('COUNT(id) AS total_products'))->get();

        return view('admin.dashboard')->with(['total_banner' => $banner[0]->total_banner, 'total_category' => $category[0]->total_category, 'total_products' => $products[0]->total_products]);
    }
}
