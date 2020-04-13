<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use DataTables;
use DB;
use File;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalProducts = Product::count();

        $inStock  = Product::where('stock', '>', 0)->count();
        $outStock = Product::where('stock', '=', 0)->count();

        return view('admin.productView')->with([
            'total_products' => $totalProducts,
            'in_stock'       => $inStock,
            'out_stock'      => $outStock,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('status', 1)->orderBy('position', 'ASC')->get();

        $productId = $this->GetProductId();

        return view('admin.productAdd')->with(['category' => $category, 'product_id' => $productId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id'   => 'required|unique:products|integer',
            'cid'          => 'required',
            'product_name' => 'required|unique:products|max:255',
            'status'       => 'required',
            'stock'        => 'required|integer',
            'price'        => 'required|numeric',
            'tag_line'     => 'required|max:500',
            'description'  => 'required',
            'image'        => 'array|max:10',
            'image.*'      => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $product = request()->all();
        $url     = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $product['product_name'])));
        $images  = array();

        $product['url'] = $url;

        $create = Product::create($product);
        $pid    = $create->id;

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $value) {
                $imagename  = $url . '-' . time() . $key . '.' . $value->getClientOriginalExtension();
                $uploadPath = public_path('/uploads/products/large/');

                $thumbnail = Image::make($value->getRealPath());
                $thumbnail->resize(180, 240);
                $thumbnail->save(public_path('/uploads/products/thumbnail/' . $imagename));

                $value->move($uploadPath, $imagename);

                $images[] = $imagename;
            }
        }

        if (!empty($images)) {
            foreach ($images as $key => $value) {
                $values = array(
                    'pid'        => $pid,
                    'image'      => $value,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                );

                DB::table('products_images')->insert($values);
            }
        }

        return redirect()->route('product.index')->with('success', 'Product added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product  = Product::find($id);
        $category = Category::orderBy('position', 'ASC')->get();
        $images   = DB::table('products_images')->where('pid', $id)->get();

        return view('admin.productEdit')->with(['product' => $product, 'category' => $category, 'images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id'   => 'required|integer|unique:products,product_id,' . $id,
            'cid'          => 'required',
            'product_name' => 'required|max:255|unique:products,product_name,' . $id,
            'status'       => 'required',
            'stock'        => 'required|integer',
            'price'        => 'required|numeric',
            'tag_line'     => 'required|max:500',
            'description'  => 'required',
            'image'        => 'array|max:10',
            'image.*'      => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $product = request()->all();

        $url = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $product['product_name'])));

        $product['url'] = $url;

        Product::find($id)->update($product);

        $images = array();

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $key => $value) {
                $imagename  = $url . '-' . time() . $key . '.' . $value->getClientOriginalExtension();
                $uploadPath = public_path('/uploads/products/large/');

                $thumbnail = Image::make($value->getRealPath());
                $thumbnail->resize(180, 240);
                $thumbnail->save(public_path('/uploads/products/thumbnail/' . $imagename));

                $value->move($uploadPath, $imagename);

                $images[] = $imagename;
            }
        }

        if (!empty($images)) {
            foreach ($images as $key => $value) {
                $values = array(
                    'pid'        => $id,
                    'image'      => $value,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                );

                DB::table('products_images')->insert($values);
            }
        }

        return redirect()->route('product.index')->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $images  = DB::table('products_images')->where('pid', $id)->get();

        if ($product->delete()) {
            if (!empty($images)) {
                foreach ($images as $image) {
                    $image = 'public/uploads/products/' . $image->image;
                    File::delete($image);
                }
            }
        }

        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }

    public function GetProductId()
    {
        $product = Product::orderBy('id', 'DESC')->first();

        if (!empty($product)) {
            $product_id = $product->product_id;
            $product_id++;
            return $product_id;
        } else {
            return 100000;
        }
    }

    public function datatable()
    {
        return DataTables::of(Product::query())
            ->editColumn('cid', function ($product) {
                $category = Category::find($product->cid);
                return $category->title;
            })
            ->editColumn('status', function ($product) {
                if ($product->status == 1) {
                    return '<span class="badge badge-success p-5">Active</span>';
                } else {
                    return '<span class="badge badge-danger p-5">Inactive</span>';
                }
            })
            ->editColumn('is_featured', function ($product) {
                if ($product->is_featured == 1) {
                    return '<span class="badge badge-success p-5">Yes</span>';
                } else {
                    return '<span class="badge badge-danger p-5">No</span>';
                }
            })
            ->addColumn('manage', function ($product) {
                return '<a href="product/' . $product->id . '/edit" class="btn btn-sm btn-outline-info"><i class="fa fa-edit"></i></a>&nbsp;<a href="product/' . $product->id . '/delete" class="btn btn-sm btn-outline-danger ml-5"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['cid', 'status', 'is_featured', 'manage'])
            ->make(true);
    }

    public function deleteImage($id)
    {
        $image = DB::table('products_images')->where('id', $id)->first();

        $largeimage = 'public/uploads/products/large/' . $image->image;
        $thumbnail  = 'public/uploads/products/thumbnail/' . $image->image;

        if (File::delete($largeimage)) {
            File::delete($thumbnail);
            DB::table('products_images')->where('id', $id)->delete();
            return 'true';
        }
    }
}
