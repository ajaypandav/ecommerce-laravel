@extends('admin.layouts.default')

@section('content')
    <!-- Page Content -->
    <div class="content">
        <div class="row invisible" data-toggle="appear">
            <!-- Row #1 -->
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="{{ url('admin/banner') }}">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="si si-picture fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{ $total_banner }}"></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Banner</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="{{ url('admin/category') }}">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="fa fa-align-left fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{ $total_category }}"></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Category</div>
                    </div>
                </a>
            </div>
            <div class="col-6 col-xl-3">
                <a class="block block-link-shadow text-right" href="{{ url('admin/product') }}">
                    <div class="block-content block-content-full clearfix">
                        <div class="float-left mt-10 d-none d-sm-block">
                            <i class="fa fa-product-hunt fa-3x text-body-bg-dark"></i>
                        </div>
                        <div class="font-size-h3 font-w600" data-toggle="countTo" data-speed="1000" data-to="{{ $total_products }}"></div>
                        <div class="font-size-sm font-w600 text-uppercase text-muted">Products</div>
                    </div>
                </a>
            </div>
            <!-- END Row #1 -->
        </div>
    </div>
    <!-- END Page Content -->
@endsection
