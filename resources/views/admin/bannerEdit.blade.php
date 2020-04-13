@extends('admin.layouts.default')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Edit Banner</h2>
        <div class="block">
            <div class="block-content">
                <div class="row">
                    <div class="col-xl-6">
                        <form class="js-validation-bootstrap" method="post" action="{{ route('banner.update', $banner->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="banner_title">Banner Title </label>
                                <input type="text" class="form-control" id="banner_title" name="banner_title" placeholder="Enter banner title" value="{{ $banner->banner_title }}">
                            </div>
                            <div class="form-group">
                                <label for="shop_link">Shop Link <span class="text-danger">Expecting base url</span></label>
                                <input type="text" class="form-control" id="shop_link" name="shop_link" placeholder="Enter shop link" value="{{ $banner->shop_link }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Image <span class="text-danger">Image size 1920x570</span></label>
                                <div class="custom-file">
                                    <input type="file" class="form-control custom-file-input" id="image" name="image" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                <img src="{{URL::to('/')}}/public/uploads/banner/{{ $banner->image }}" class="mt-3" alt="" width="300px">
                            </div>
                            <div class="form-group">
                                <label for="position">Position <span class="text-danger">*</span></label>
                                <input type="text" class="form-control number" id="position" name="position" placeholder="Enter Position" required="" value="{{ $banner->position }}">
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label><br>
                                <label class="css-control css-control-sm css-control-primary css-radio">
                                    <input type="radio" class="css-control-input" name="status" checked value="1">
                                    <span class="css-control-indicator"></span> Active
                                </label>
                                <label class="css-control css-control-sm css-control-danger css-radio">
                                    <input type="radio" class="css-control-input" name="status" value="0" @if($banner->status == 0) checked @endif>
                                    <span class="css-control-indicator"></span> Inactive
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary" name="btnSubmit"> Submit </button>
                                <a href="{{ url('admin/banner') }}" class="btn btn-alt-danger">Cancel</a>
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