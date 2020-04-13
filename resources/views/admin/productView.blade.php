@extends('admin.layouts.default')

@section('css_before')
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Products</h2>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row gutters-tiny mb-3">
            <!-- All Products -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-circle-o fa-2x text-info-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-info" data-toggle="countTo" data-to="{{ $total_products }}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">All Products</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END All Products -->

            <!-- Top Sellers -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-star fa-2x text-warning-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-warning" data-toggle="countTo" data-to="{{ $in_stock }}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">In Stock</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Top Sellers -->

            <!-- Out of Stock -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="javascript:void(0)">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-warning fa-2x text-danger-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-danger" data-toggle="countTo" data-to="{{ $out_stock }}">0</div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">Out of Stock</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Out of Stock -->

            <!-- Add Product -->
            <div class="col-md-6 col-xl-3">
                <a class="block block-rounded block-link-shadow" href="{{ url('admin/product/create') }}">
                    <div class="block-content block-content-full block-sticky-options">
                        <div class="block-options">
                            <div class="block-options-item">
                                <i class="fa fa-archive fa-2x text-success-light"></i>
                            </div>
                        </div>
                        <div class="py-20 text-center">
                            <div class="font-size-h2 font-w700 mb-0 text-success">
                                <i class="fa fa-plus"></i>
                            </div>
                            <div class="font-size-sm font-w600 text-uppercase text-muted">New Product</div>
                        </div>
                    </div>
                </a>
            </div>
            <!-- END Add Product -->
        </div>
        <div class="block">
            <div class="block-content block-content-full">
                <table class="table table-bordered table-hover table-vcenter js-dataTable-full" id="dataTable">
                    <thead>
                        <tr>
                            <th>Product ID</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Featured</th>
                            <th>Status</th>
                            <th>Manage</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')
<script src="{{ asset('js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('js/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script>
	jQuery("#dataTable").dataTable({
        columnDefs: [{
            orderable: !1,
            targets: [6, 7]
        }],
        order: [[ 0, "asc" ]],
        pageLength: 10,
        lengthMenu: [
            [5, 10, 25, 50, 100],
            [5, 10, 25, 50, 100]
        ],
        autoWidth: !1,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{ url('admin/product/data') }}',
        columns: [
            { data: 'product_id', name: 'product_id' },
            { data: 'product_name', name: 'product_name' },
            { data: 'cid', name: 'cid' },
            { data: 'stock', name: 'stock' },
            { data: 'price', name: 'price' },
            { data: 'is_featured', name: 'is_featured' },
            { data: 'status', name: 'status' },
            { data: 'manage', name: 'manage' }
        ]
    });
</script>
@endsection