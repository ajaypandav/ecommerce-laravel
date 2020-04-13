<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>

@extends('front.layouts.default')

@section('css_before')
    <title>Blog | {{ $site_title->value }}</title>
@endsection

@section('content')
    <section class="bg-title-page flex-col-c-m" style="background-image: url({{ asset('front/images/custom-page-header.jpg') }});">
        <h2 class="text-white font-weight-bold"> Blog </h2>
    </section>

    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-75">
                    <div class="p-r-50 p-r-0-lg">
                        @foreach($blogs as $blog)
                        <?php
                            $blogCat = array();

                            $category = DB::table('blog_cids')
                                ->select('blog_categories.title')
                                ->join('blog_categories', 'blog_cids.bcid', '=', 'blog_categories.id')
                                ->where('blog_cids.bid', $blog->id)
                                ->get();

                            foreach ($category as $key => $value) {
                                $blogCat[] = $value->title;
                            }
                        ?>
                            <div class="item-blog p-b-80">
                                <a href="{{ url('/blog-detail') }}/{{ $blog->url }}" class="item-blog-img pos-relative dis-block hov-img-zoom">
                                    <img src="{{URL::to('/')}}/public/uploads/blog/{{ $blog->image }}" alt="{{ $blog->title }}">
                                    <span class="item-blog-date dis-block flex-c-m pos1 size17 bg4 s-text1"> {{ date('M d, Y', strtotime($blog->created_at)) }} </span>
                                </a>
                                <div class="item-blog-txt p-t-33">
                                    <h4 class="p-b-11"><a href="{{ url('/blog-detail') }}/{{ $blog->url }}" class="m-text24"> {{ $blog->title }} </a></h4>
                                    <div class="s-text8 flex-w flex-m p-b-21">
                                        <span> By {{ $blog->author }} <span class="m-l-3 m-r-6">|</span></span>
                                        <span> {{ implode(', ', $blogCat) }} <span class="m-l-3 m-r-6">|</span></span>
                                        <span> 8 Comments </span>
                                    </div>
                                    {!! substr($blog->description, 0, 300) !!}
                                    <a href="{{ url('/blog-detail') }}/{{ $blog->url }}" class="s-text20"> Continue Reading <i class="fa fa-long-arrow-right m-l-8" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="pagination flex-m flex-w p-r-50">
                        <a href="#" class="item-pagination flex-c-m trans-0-4 active-pagination">1</a>
                        <a href="#" class="item-pagination flex-c-m trans-0-4">2</a>
                    </div>
                </div>
                @include('front.include.blogSidebar')
            </div>
        </div>
    </section>
@endsection