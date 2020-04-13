<?php

namespace App\Http\Controllers\Admin;

use App\BlogCategory;
use App\Http\Controllers\Controller;
use DataTables;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blogCategoryView');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blogCategoryAdd');
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
            'title'  => 'required|unique:blog_categories|max:255',
            'status' => 'required',
        ]);

        $blogCategory = request()->all();

        $url = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $blogCategory['title'])));

        $blogCategory['url'] = $url;

        BlogCategory::create($blogCategory);

        return redirect()->route('blogCategory.index')->with('success', 'Blog Category added successfully!');
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
        $blogCategory = BlogCategory::find($id);

        return view('admin.blogCategoryEdit')->with('blogCategory', $blogCategory);
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
            'title'  => 'required|unique:blog_categories,title,' . $id,
            'status' => 'required',
        ]);

        $blogCategory = request()->all();

        $url = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $blogCategory['title'])));

        $blogCategory['url'] = $url;

        BlogCategory::find($id)->update($blogCategory);

        return redirect()->route('blogCategory.index')->with('success', 'Blog Category updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blogCategory = BlogCategory::find($id);
        try {
            $blogCategory->delete();

            return redirect()->route('blogCategory.index')->with('success', 'Blog Category deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('blogCategory.index')->with('failed', 'Blog Category can not deleted. Dependent record exist.');
        }
    }

    public function datatable()
    {
        return DataTables::of(BlogCategory::query())
            ->editColumn('status', function ($blogCategory) {
                if ($blogCategory->status == 1) {
                    return '<span class="badge badge-success p-5">Active</span>';
                } else {
                    return '<span class="badge badge-danger p-5">Inactive</span>';
                }
            })
            ->addColumn('manage', function ($blogCategory) {
                return '<a href="blogCategory/' . $blogCategory->id . '/edit" class="btn btn-sm btn-outline-info"><i class="fa fa-edit"></i></a>&nbsp;<a href="blogCategory/' . $blogCategory->id . '/delete" class="btn btn-sm btn-outline-danger ml-5"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['status', 'manage'])
            ->make(true);
    }
}
