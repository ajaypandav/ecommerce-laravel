@extends('admin.layouts.default')

@section('css_before')
<link rel="stylesheet" href="{{ asset('js/plugins/select2/css/select2.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Edit Blog</h2>
        <div class="block">
            <div class="block-content">
                <form class="js-validation-bootstrap" method="post" action="{{ route('blog.update', $blog->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required="" value="{{ $blog->title }}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="bcid">Category <span class="text-danger">*</span></label>
                                <select class="js-select2 form-control" id="bcid" name="bcid[]" style="width: 100%;" data-placeholder="Choose category" multiple required="">
                                    <option></option>
                                    @foreach($blogCategory as $category)
                                        <option value="{{ $category->id }}" @if(in_array($category->id, $blogCids)) selected @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('bcid'))
                                    <span class="text-danger">{{ $errors->first('bcid') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="author">Author <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="author" name="author" placeholder="Enter author" required="" value="{{ $blog->author }}">
                                @if ($errors->has('author'))
                                    <span class="text-danger">{{ $errors->first('author') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="image">Image <span class="text-danger">*</span></label>
                                <div class="custom-file">
                                    <input type="file" class="form-control custom-file-input" id="image" name="image" data-toggle="custom-file-input">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                                <img src="{{URL::to('/')}}/public/uploads/blog/{{ $blog->image }}" class="mt-3" alt="" width="100px">
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="short_description">Short Description </label>
                                <textarea name="short_description" id="short_description" class="form-control" maxlength="255" placeholder="Enter short description">{{ $blog->short_description }}</textarea>
                                @if ($errors->has('short_description'))
                                    <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="js-summernote" required="">{{ $blog->description }}</textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label for="tags">Tags </label>
                                <input type="text" class="js-tags-input form-control" data-height="34px" id="tags" name="tags" value="{{ $blogTags }}">
                                @if ($errors->has('tags'))
                                    <span class="text-danger">{{ $errors->first('tags') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label><br>
                                <label class="css-control css-control-sm css-control-primary css-radio">
                                    <input type="radio" class="css-control-input" name="status" checked value="1">
                                    <span class="css-control-indicator"></span> Active
                                </label>
                                <label class="css-control css-control-sm css-control-danger css-radio">
                                    <input type="radio" class="css-control-input" name="status" value="0" @if($blog->status == 0) checked @endif>
                                    <span class="css-control-indicator"></span> Inactive
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary" name="btnSubmit"> Submit </button>
                                <a href="{{ url('admin/blog') }}" class="btn btn-alt-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
<script src="{{ asset('js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-validation/additional-methods.js') }}"></script>
<script src="{{ asset('js/formValidation.js') }}"></script>
<script src="{{ asset('js/plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('js/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>

<script>jQuery(function(){ Codebase.helpers(['select2', 'summernote', 'tags-inputs']); });</script>
@endsection