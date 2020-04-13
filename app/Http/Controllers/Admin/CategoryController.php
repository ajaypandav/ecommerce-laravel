<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use DataTables;
use File;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categoryView');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoryAdd');
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
            'title'    => 'required|unique:categories|max:255',
            'position' => 'required',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'status'   => 'required',
        ]);

        $category = request()->all();

        $url = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $category['title'])));

        $category['url'] = $url;

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $name       = $url . '-' . time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('/uploads/category/');
            $image->move($uploadPath, $name);
            $category['image'] = $name;
        }

        Category::create($category);

        return redirect()->route('category.index')->with('success', 'Category added successfully!');
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
        $category = Category::find($id);

        return view('admin.categoryEdit')->with('category', $category);
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
            'title'    => 'required|unique:categories,title,' . $id,
            'position' => 'required',
            'image'    => 'image|mimes:jpeg,png,jpg,gif|max:10240',
            'status'   => 'required',
        ]);

        $category = request()->all();

        $url             = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $category['title'])));
        $category['url'] = $url;

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $name       = $url . '-' . time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('/uploads/category/');
            $image->move($uploadPath, $name);
            $category['image'] = $name;

            $oldImage = Category::find($id);
            $image    = 'public/uploads/category/' . $oldImage->image;
            File::delete($image);
        }

        Category::find($id)->update($category);

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        try {
            $image = 'public/uploads/category/' . $category->image;
            File::delete($image);

            $category->delete();

            return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('category.index')->with('failed', 'Category can not deleted. Dependent record exist.');
        }
    }

    public function datatable()
    {
        return DataTables::of(Category::query())
            ->editColumn('image', function ($category) {
                return '<a class="img-link img-link-zoom-in img-thumb img-lightbox" href="' . asset('uploads/category/' . $category->image) . '">
                            <img src="' . asset('uploads/category/' . $category->image) . '" width="150px">
                        </a>';
            })
            ->editColumn('status', function ($category) {
                if ($category->status == 1) {
                    return '<span class="badge badge-success p-5">Active</span>';
                } else {
                    return '<span class="badge badge-danger p-5">Inactive</span>';
                }
            })
            ->addColumn('manage', function ($category) {
                return '<a href="category/' . $category->id . '/edit" class="btn btn-sm btn-outline-info"><i class="fa fa-edit"></i></a>&nbsp;<a href="category/' . $category->id . '/delete" class="btn btn-sm btn-outline-danger ml-5"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['image', 'status', 'manage'])
            ->make(true);
    }
}
