@extends('admin.layouts.default')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Edit Blog Category</h2>
        <div class="block">
            <div class="block-content">
                <div class="row">
                    <div class="col-xl-6">
                        <form class="js-validation-bootstrap" method="post" action="{{ route('blogCategory.update', $blogCategory->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required="" value="@if(old('title')){{old('title')}}@else{{$blogCategory->title}}@endif">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label><br>
                                <label class="css-control css-control-sm css-control-primary css-radio">
                                    <input type="radio" class="css-control-input" name="status" checked value="1">
                                    <span class="css-control-indicator"></span> Active
                                </label>
                                <label class="css-control css-control-sm css-control-danger css-radio">
                                    <input type="radio" class="css-control-input" name="status" value="0" @if($blogCategory->status == 0) checked @endif>
                                    <span class="css-control-indicator"></span> Inactive
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary" name="btnSubmit"> Submit </button>
                                <a href="{{ url('admin/blogCategory') }}" class="btn btn-alt-danger">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
<script src="{{ asset('js/formValidation.js') }}"></script>
@endsection