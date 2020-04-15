<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $sidebar = $this->sidebar();

        $blogs = DB::table('blogs')->where('status', 1)->orderBy('created_at', 'DESC')->paginate(5);

        $data = [
            'blogs'      => $blogs,
            'categories' => $sidebar['categories'],
            'tags'       => $sidebar['tags'],
            'request'    => $request,
        ];

        return view('front.blog')->with($data);
    }

    public function category($url, Request $request)
    {
        $sidebar = $this->sidebar();

        $category = DB::table('blog_categories')->where('url', $url)->first();

        if (!empty($category->id)) {
            $blogs = DB::table('blogs')
                ->join('blog_cids', 'blogs.id', '=', 'blog_cids.bid')
                ->where('blog_cids.bcid', $category->id)
                ->where('blogs.status', 1)
                ->orderBy('blogs.created_at', 'DESC')
                ->paginate(5);

            $data = [
                'blogs'      => $blogs,
                'categories' => $sidebar['categories'],
                'tags'       => $sidebar['tags'],
                'request'    => $request,
            ];

            return view('front.blog')->with($data);
        } else {
            return view('front.404');
        }
    }

    public function tag($tag, Request $request)
    {
        $sidebar = $this->sidebar();

        $blogs = DB::table('blogs')
            ->join('blog_tags', 'blogs.id', '=', 'blog_tags.bid')
            ->where('blog_tags.tag', $tag)
            ->where('blogs.status', 1)
            ->orderBy('blogs.created_at', 'DESC')
            ->paginate(5);

        $data = [
            'blogs'      => $blogs,
            'categories' => $sidebar['categories'],
            'tags'       => $sidebar['tags'],
            'request'    => $request,
        ];

        return view('front.blog')->with($data);

    }

    public function blogdetail($url)
    {
        $sidebar = $this->sidebar();

        $blog = DB::table('blogs')->where('url', $url)->first();

        if (!empty($blog->id)) {
            $blogCat = array();

            $category = DB::table('blog_cids')
                ->select('blog_categories.title')
                ->join('blog_categories', 'blog_cids.bcid', '=', 'blog_categories.id')
                ->where('blog_cids.bid', $blog->id)
                ->get();

            foreach ($category as $key => $value) {
                $blogCat[] = $value->title;
            }

            $blogTag = array();

            $tagsData = DB::table('blog_tags')->where('bid', $blog->id)->get();

            foreach ($tagsData as $key => $value) {
                $blogTag[] = $value->tag;
            }

            // get blog comments
            $comments = DB::table('blog_comments')->where('bid', $blog->id)->count();

            $data = [
                'blog'       => $blog,
                'blog_cat'   => $blogCat,
                'blog_tag'   => $blogTag,
                'categories' => $sidebar['categories'],
                'tags'       => $sidebar['tags'],
                'comments'   => $comments,
            ];

            return view('front.blog-detail')->with($data);
        } else {
            return view('front.404');
        }
    }

    public function comment(Request $request)
    {
        $request->validate([
            'bid'     => 'required',
            'name'    => 'required|max:255',
            'email'   => 'required|max:100',
            'website' => 'max:255',
        ]);

        $data = $request->all();
        unset($data['_token']);
        $data['created_at'] = \Carbon\Carbon::now();
        $data['updated_at'] = \Carbon\Carbon::now();

        DB::table('blog_comments')->insert($data);

        return redirect()->back()->with('success', 'Comment submited successfully!');
    }

    public function sidebar()
    {
        $categories = DB::table('blog_categories')->where('status', 1)->get();

        $tags     = array();
        $tagsData = DB::table('blog_tags')->select('tag')->distinct()->get();

        foreach ($tagsData as $key => $value) {
            $tags[] = $value->tag;
        }

        return ['categories' => $categories, 'tags' => $tags];
    }
}
