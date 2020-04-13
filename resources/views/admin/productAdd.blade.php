@extends('admin.layouts.default')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Add Product</h2>
        <div class="block">
            <div class="block-content">
                <form class="js-validation-bootstrap" method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_id">Product ID <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="product_id" name="product_id" placeholder="Product ID" readonly="" required="" value="{{ $product_id }}">
                                @if ($errors->has('product_id'))
                                    <span class="text-danger">{{ $errors->first('product_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_name">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter porduct name" required="" value="{{ old('product_name') }}">
                                @if ($errors->has('product_name'))
                                    <span class="text-danger">{{ $errors->first('product_name') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cid">Category <span class="text-danger">*</span></label>
                                <select name="cid" id="cid" class="form-control" required="">
                                    <option value="">Select Category</option>
                                    @if(!empty($category))
                                        @foreach($category as $key => $value)
                                            <option value="{{ $value->id }}" @if (old('cid') && old('cid') == $value->id) selected @endif>{{ $value->title }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="stock">Stock <span class="text-danger">*</span></label>
                                <input type="text" class="form-control number" id="stock" name="stock" placeholder="Enter Stock" required="" value="{{ old('stock') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price <span class="text-danger">*</span></label>
                                <input type="text" class="form-control number-decimal" id="price" name="price" placeholder="Enter Price" required="" value="{{ old('price') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image <span class="text-danger">Image size 1200x1600</span></label>
                                <div class="custom-file">
                                    <input type="file" class="form-control custom-file-input" id="image" name="image[]" data-toggle="custom-file-input" multiple="">
                                    <label class="custom-file-label" for="image">Choose files</label>
                                </div>
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tag_line">Tag Line <span class="text-danger">*</span></label>
                                <textarea name="tag_line" id="tag_line" placeholder="Enter Tag Line" class="form-control" rows="4" required="">{{ old('tag_line') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description">Description <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" placeholder="Enter Description" class="form-control" rows="4" required="">{{ old('description') }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label><br>
                                <label class="css-control css-control-sm css-control-primary css-radio">
                                    <input type="radio" class="css-control-input" name="status" checked value="1">
                                    <span class="css-control-indicator"></span> Active
                                </label>
                                <label class="css-control css-control-sm css-control-danger css-radio">
                                    <input type="radio" class="css-control-input" name="status" value="0">
                                    <span class="css-control-indicator"></span> Inactive
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Featured Product <span class="text-danger">*</span></label><br>
                                <label class="css-control css-control-sm css-control-primary css-radio">
                                    <input type="radio" class="css-control-input" name="is_featured" value="1">
                                    <span class="css-control-indicator"></span> Yes
                                </label>
                                <label class="css-control css-control-sm css-control-danger css-radio">
                                    <input type="radio" class="css-control-input" name="is_featured" value="0" checked>
                                    <span class="css-control-indicator"></span> No
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <button type="submit" class="btn btn-alt-primary" name="btnSubmit"> Submit </button>
                                <a href="{{ url('admin/product') }}" class="btn btn-alt-danger">Cancel</a>
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
@endsection