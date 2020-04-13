<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use DataTables;
use File;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.bannerView');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bannerAdd');
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
            'position' => 'required',
            'image'    => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'status'   => 'required',
        ]);

        $banner = request()->all();

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $name       = time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('/uploads/banner/');
            $image->move($uploadPath, $name);
            $banner['image'] = $name;
        }

        Banner::create($banner);

        return redirect()->route('banner.index')->with('success', 'Banner added successfully!');
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
        $banner = Banner::find($id);

        return view('admin.bannerEdit')->with('banner', $banner);
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
            'position' => 'required',
            'status'   => 'required',
            'image'    => 'image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $banner = request()->all();

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $name       = time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('/uploads/banner/');
            $image->move($uploadPath, $name);
            $banner['image'] = $name;

            $oldBanner = Banner::find($id);
            $image     = 'public/uploads/banner/' . $oldBanner->image;
            File::delete($image);
        }

        Banner::find($id)->update($banner);

        return redirect()->route('banner.index')->with('success', 'Banner updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $banner = Banner::find($id);

        $image = 'public/uploads/banner/' . $banner->image;
        File::delete($image);

        $banner->delete();

        return redirect()->route('banner.index')->with('success', 'Banner deleted successfully!');
    }

    public function datatable()
    {
        return DataTables::of(Banner::query())
            ->editColumn('image', function ($banner) {
                return '<a class="img-link img-link-zoom-in img-thumb img-lightbox" href="' . asset('uploads/banner/' . $banner->image) . '">
                                <img src="' . asset('uploads/banner/' . $banner->image) . '" width="100px">
                            </a>';
            })
            ->editColumn('status', function ($banner) {
                if ($banner->status == 1) {
                    return '<span class="badge badge-success p-5">Active</span>';
                } else {
                    return '<span class="badge badge-danger p-5">Inactive</span>';
                }
            })
            ->addColumn('manage', function ($banner) {
                return '<a href="banner/' . $banner->id . '/edit" class="btn btn-sm btn-outline-info"><i class="fa fa-edit"></i></a>&nbsp;<a href="banner/' . $banner->id . '/delete" class="btn btn-sm btn-outline-danger ml-5"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['status', 'image', 'manage'])
            ->make(true);
    }
}
