@extends('admin.layouts.default')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">View Blog</h2>
        <div class="block">
            <div class="block-content">
                <div class="row">
                    <div class="col mb-3" align="right">
                        <a href="{{ url('admin/blog') }}" class="btn btn-alt-danger">Back</a>
                    </div>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <td>Title</td>
                            <td>{{ $blog->title }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $blogCids }}</td>
                        </tr>
                        <tr>
                            <td>Author</td>
                            <td>{{ $blog->author }}</td>
                        </tr>
                        <tr>
                            <td>Short Description</td>
                            <td>{{ $blog->short_description }}</td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>{!! $blog->description !!}</td>
                        </tr>
                        <tr>
                            <td>Tags</td>
                            <td>{{ $blogTags }}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src="{{URL::to('/')}}/public/uploads/blog/{{ $blog->image }}" alt="" width="300px"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection