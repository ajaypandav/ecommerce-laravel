<?php $site_title = DB::table('options')->where('key', '=', 'site_title')->first(); ?>

@extends('front.layouts.default')

@section('css_before')
    <title>{{ $blog->title }}</title>
    <meta name="author" content="{{ $blog->author }}">
    <meta name="keywords" content="{{ implode(', ', $blog_tag) }}">
    <meta name="description" content="{{ substr($blog->short_description, 0, 150) }}">
@endsection

@section('content')
    <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
        <a href="{{ url('/') }}" class="s-text16"> Home <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i></a>
        <a href="{{ url('/blog/') }}" class="s-text16"> Blog <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i></a>
        <span class="s-text17"> {{ $blog->title }} </span>
    </div>

    <section class="bgwhite p-t-60">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-50 p-r-0-lg">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        <div class="p-b-40">
                            <div class="blog-detail-img wrap-pic-w">
                                <img src="{{URL::to('/')}}/public/uploads/blog/{{ $blog->image }}" alt="{{ $blog->title }}">
                            </div>
                            <div class="blog-detail-txt p-t-33">
                                <h4 class="p-b-11 m-text24"> {{ $blog->title }} </h4>
                                <div class="s-text8 flex-w flex-m p-b-21">
                                    <span> By {{ $blog->author }} <span class="m-l-3 m-r-6">|</span></span>
                                    <span> {{ date('M d, Y', strtotime($blog->created_at)) }} <span class="m-l-3 m-r-6">|</span></span>
                                    <span> {{ implode(', ', $blog_cat) }} <span class="m-l-3 m-r-6">|</span></span>
                                    <span> {{ $comments }} Comments </span>
                                </div>
                                {!! $blog->description !!}
                            </div>
                            @if(!empty($blog_tag))
                                <div class="flex-m flex-w p-t-20">
                                    <span class="s-text20 p-r-20"> Tags </span>
                                    <div class="wrap-tags flex-w">
                                        @foreach($blog_tag as $tag)
                                            <a href="{{ url('/blog/tag/') }}/{{ $tag }}" class="tag-item"> {{ $tag }} </a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>

                        <form class="leave-comment" method="post" id="comment-form" action="{{ route('blog.comment') }}">
                            @csrf
                            <input type="hidden" name="bid" value="{{ $blog->id }}">
                            <h4 class="m-text25 p-b-14"> Leave a Comment </h4>
                            <p class="s-text8 p-b-40">
                                Your email address will not be published. Required fields are marked *
                            </p>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control border-secondary border" type="text" id="name" name="name" placeholder="Name *" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control border-secondary border" type="email" id="email" name="email" placeholder="Email *" required="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input class="form-control border-secondary border" type="url" id="website" name="website" placeholder="Website">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control border-secondary border" id="comment" name="comment" placeholder="Comment..."></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-20">
                                <button class="w-size24 flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" type="submit">
                                    Post Comment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @include('front.include.blogSidebar')
            </div>
        </div>
    </section>
@endsection

@section('js_after')

<script type="text/javascript">
    $(document).ready(function() {
        $('#comment-form').validate({
            errorClass: 'error animated fadeInDown mb-0 mt-1',
            errorPlacement: (error, e) => {
                $(e).parents('.form-group').append(error);
            },
            highlight: e => {
                $(e).closest('.form-group').removeClass('is-invalid').addClass('is-invalid');
            },
            success: e => {
                $(e).closest('.form-group').removeClass('is-invalid');
                $(e).remove();
            }
        });
    });
</script>
@endsection
