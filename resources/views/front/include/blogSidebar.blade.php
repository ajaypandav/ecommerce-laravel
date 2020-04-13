<div class="col-md-4 col-lg-3 p-b-75">
    <div class="rightbar">
        @if(!empty($categories))
            <h4 class="m-text23 p-b-34"> Categories </h4>
            <ul>
                @foreach($categories as $category)
                    <li class="p-t-6 p-b-8 bo7">
                        <a href="{{ url('/blog/') }}/{{ $category->url }}" class="s-text13 p-t-5 p-b-5"> {{ $category->title }} </a>
                    </li>
                @endforeach
            </ul>
        @endif

        @if(!empty($tags))
            <h4 class="m-text23 p-t-50 p-b-25"> Tags </h4>
            <div class="wrap-tags flex-w">
                @foreach($tags as $tag)
                    <a href="{{ url('/blog/tag/') }}/{{ $tag }}" class="tag-item"> {{ $tag }} </a>
                @endforeach
            </div>
        @endif
    </div>
</div>