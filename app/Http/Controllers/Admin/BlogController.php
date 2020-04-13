<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Controllers\Controller;
use DataTables;
use DB;
use File;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.blogView');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategory = DB::table('blog_categories')->where('status', 1)->get();

        return view('admin.blogAdd')->with('blogCategory', $blogCategory);
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
            'title'             => 'required|unique:blogs|max:255',
            'bcid.*'            => 'required',
            'author'            => 'required|max:255',
            'image'             => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'description'       => 'required',
            'short_description' => 'max:255',
            'status'            => 'required',
        ]);

        $blog = request()->all();

        $url = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $blog['title'])));

        $blog['url'] = $url;

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $name       = $url . '-' . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('/uploads/blog/');
            $image->move($uploadPath, $name);
            $blog['image'] = $name;
        }

        $bcData  = $blog['bcid'];
        $tagData = explode(',', $blog['tags']);

        unset($blog['bcid'], $blog['tags']);

        $create = Blog::create($blog);

        $bid = $create->id;

        // Insert blog category
        if (!empty($bcData)) {
            foreach ($bcData as $key => $value) {
                $values = array(
                    'bid'        => $bid,
                    'bcid'       => $value,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                );

                DB::table('blog_cids')->insert($values);
            }
        }

        // Insert blog tag
        if (!empty($tagData)) {
            foreach ($tagData as $key => $value) {
                if (!empty($value)) {
                    $values = array(
                        'bid'        => $bid,
                        'tag'        => $value,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    );

                    DB::table('blog_tags')->insert($values);
                }
            }
        }

        return redirect()->route('blog.index')->with('success', 'Blog added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog     = Blog::find($id);
        $blogCids = array();
        $blogTags = array();

        $blogCidData = DB::table('blog_cids')->select('blog_categories.title')->join('blog_categories', 'blog_cids.bcid', '=', 'blog_categories.id')->where('blog_cids.bid', $id)->get();

        foreach ($blogCidData as $key => $value) {
            $blogCids[] = $value->title;
        }

        $blogTagData = DB::table('blog_tags')->where('bid', $id)->get();

        foreach ($blogTagData as $key => $value) {
            $blogTags[] = $value->tag;
        }

        $blogTags = implode(', ', $blogTags);
        $blogCids = implode(', ', $blogCids);

        return view('admin.blogDetail')->with(['blog' => $blog, 'blogCids' => $blogCids, 'blogTags' => $blogTags]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog     = Blog::find($id);
        $blogCids = array();
        $blogTags = array();

        $blogCategory = DB::table('blog_categories')->where('status', 1)->get();

        $blogCidData = DB::table('blog_cids')->where('bid', $id)->get();

        foreach ($blogCidData as $key => $value) {
            $blogCids[] = $value->bcid;
        }

        $blogTagData = DB::table('blog_tags')->where('bid', $id)->get();

        foreach ($blogTagData as $key => $value) {
            $blogTags[] = $value->tag;
        }

        $blogTags = implode(',', $blogTags);

        return view('admin.blogEdit')->with(['blog' => $blog, 'blogCategory' => $blogCategory, 'blogCids' => $blogCids, 'blogTags' => $blogTags]);
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
            'title'             => 'required|unique:blogs,title,' . $id,
            'bcid.*'            => 'required',
            'author'            => 'required|max:255',
            'image'             => 'image|mimes:jpeg,png,jpg,gif|max:10240',
            'short_description' => 'max:255',
            'description'       => 'required',
            'status'            => 'required',
        ]);

        $blog = request()->all();

        $url         = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $blog['title'])));
        $blog['url'] = $url;

        if ($request->hasFile('image')) {
            $image      = $request->file('image');
            $name       = $url . '-' . time() . '.' . $image->getClientOriginalExtension();
            $uploadPath = public_path('/uploads/blog/');
            $image->move($uploadPath, $name);
            $blog['image'] = $name;

            $oldImage = Blog::find($id);
            $image    = 'public/uploads/blog/' . $oldImage->image;
            File::delete($image);
        }

        $bcData  = $blog['bcid'];
        $tagData = explode(',', $blog['tags']);

        unset($blog['bcid'], $blog['tags']);

        Blog::find($id)->update($blog);

        // Insert blog category
        if (!empty($bcData)) {
            DB::table('blog_cids')->where('bid', $id)->delete();

            foreach ($bcData as $key => $value) {
                $values = array(
                    'bid'        => $id,
                    'bcid'       => $value,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now(),
                );

                DB::table('blog_cids')->insert($values);
            }
        }

        // Insert blog tag
        DB::table('blog_tags')->where('bid', $id)->delete();
        if (!empty($tagData)) {
            foreach ($tagData as $key => $value) {
                if (!empty($value)) {
                    $values = array(
                        'bid'        => $id,
                        'tag'        => $value,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now(),
                    );

                    DB::table('blog_tags')->insert($values);
                }
            }
        }

        return redirect()->route('blog.index')->with('success', 'Blog updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::find($id);
        try {
            $image = 'public/uploads/blog/' . $blog->image;
            File::delete($image);

            $blog->delete();

            return redirect()->route('blog.index')->with('success', 'Blog deleted successfully!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->route('blog.index')->with('failed', 'Blog can not deleted. Dependent record exist.');
        }
    }

    public function datatable()
    {
        return DataTables::of(Blog::query())
            ->editColumn('status', function ($blog) {
                if ($blog->status == 1) {
                    return '<span class="badge badge-success p-5">Active</span>';
                } else {
                    return '<span class="badge badge-danger p-5">Inactive</span>';
                }
            })
            ->addColumn('manage', function ($blog) {
                return '<a href="blog/' . $blog->id . '/edit" class="btn btn-sm btn-outline-info"><i class="fa fa-edit"></i></a>&nbsp;<a href="blog/' . $blog->id . '/delete" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>&nbsp;<a href="blog/' . $blog->id . '" class="btn btn-sm btn-outline-info"><i class="fa fa-eye"></i></a>&nbsp;<a href="blog/' . $blog->id . '/comment" class="btn btn-sm btn-outline-primary"><i class="fa fa-comment"></i></a>';
            })
            ->rawColumns(['status', 'manage'])
            ->make(true);
    }

    public function comment($id)
    {
        $blog = Blog::find($id);
        return view('admin.blogComment')->with(['blog' => $blog]);
    }

    public function commentData($id)
    {
        return DataTables::of(DB::table('blog_comments')->where('bid', $id))
            ->addColumn('manage', function ($comment) {
                return '<a href="' . url('/') . '/admin/blog/comment/' . $comment->id . '/delete" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i></a>';
            })
            ->rawColumns(['manage'])
            ->make(true);
    }

    public function deleteComment($id)
    {
        DB::table('blog_comments')->where('id', $id)->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
