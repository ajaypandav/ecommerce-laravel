@extends('admin.layouts.default')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Edit Category</h2>
        <div class="block">
            <div class="block-content">
                <div class="row">
                    <div class="col-xl-6">
                        <form class="js-validation-bootstrap" method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required="" value="@if(old('title')){{old('title')}}@else{{$category->title}}@endif">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="position">Position <span class="text-danger">*</span></label>
                                <input type="text" class="form-control number" id="position" name="position" placeholder="Enter Position" required="" value="{{ $category->position }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Header Image <span class="text-danger">Image size 1920x239</span></label>
                                <div class="custom-file">
                                    <input type="file" class="form-control custom-file-input" id="image" name="image" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                <img src="{{URL::to('/')}}/public/uploads/category/{{ $category->image }}" class="mt-3" alt="" width="300px">
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label><br>
                                <label class="css-control css-control-sm css-control-primary css-radio">
                                    <input type="radio" class="css-control-input" name="status" checked value="1">
                                    <span class="css-control-indicator"></span> Active
                                </label>
                                <label class="css-control css-control-sm css-control-danger css-radio">
                                    <input type="radio" class="css-control-input" name="status" value="0" @if($category->status == 0) checked @endif>
                                    <span class="css-control-indicator"></span> Inactive
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary" name="btnSubmit"> Submit </button>
                                <a href="{{ url('admin/category') }}" class="btn btn-alt-danger">Cancel</a>
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