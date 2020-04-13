@extends('admin.layouts.default')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Settings</h2>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="block">
            <div class="block-content">
                <div class="row">
                    <div class="col-xl-6">
                        <form class="js-validation-bootstrap" method="post" action="{{ url('admin/settings/update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="site_title">Site Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="site_title" name="site_title" placeholder="Enter Title" required="" value="{{ $setting['site_title'] }}">
                                @if ($errors->has('site_title'))
                                    <span class="text-danger">{{ $errors->first('site_title') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="favicon">Favicon</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control custom-file-input" id="favicon" name="favicon" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="favicon">Choose file</label>
                                </div>
                                <img src="{{URL::to('/')}}/public/uploads/{{ $setting['favicon'] }}" class="mt-3" alt="">
                            </div>
                            <div class="form-group">
                                <label for="image">Logo</label>
                                <div class="custom-file">
                                    <input type="file" class="form-control custom-file-input" id="logo" name="logo" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="logo">Choose file</label>
                                </div>
                                <img src="{{URL::to('/')}}/public/uploads/{{ $setting['logo'] }}" class="mt-3" alt="" style="max-width: 100px;">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary" name="btnSubmit"> Submit </button>
                                <a href="{{ url('admin/dashboard') }}" class="btn btn-alt-danger">Cancel</a>
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