@extends('admin.layouts.default')

@section('css_before')
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Blog Category</h2>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if(Session::has('failed'))
            <div class="alert alert-danger">
                {{ Session::get('failed') }}
            </div>
        @endif
        <div class="block">
            <div class="block-header block-header-default d-block">
                <div class="row">
                	<div class="col" align="right">
                		<a href="{{ url('admin/blogCategory/create') }}" class="btn btn-outline-primary"><i class="fa fa-plus mr-5"></i> Add New</a>
                	</div>
                </div>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-hover table-vcenter js-dataTable-full" id="dataTable">
                    <thead>
                        <tr>
                            <th>Title</th>
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
            targets: [1, 2]
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
        ajax: '{{ url('admin/blogCategory/data') }}',
        columns: [
            { data: 'title', name: 'title' },
            { data: 'status', name: 'status' },
            { data: 'manage', name: 'manage' }
        ]
    });
</script>
@endsection