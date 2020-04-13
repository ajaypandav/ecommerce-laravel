@extends('admin.layouts.default')

@section('css_before')
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Orders</h2>
        @if(Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="block">
            <div class="block-content block-content-full">
                <table class="table table-bordered table-hover table-vcenter js-dataTable-full" id="dataTable">
                    <thead>
                        <tr>
                            <th>Order Date Time</th>
                            <th>Order ID</th>
                            <th>Ordered By</th>
                            <th>Order Status</th>
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
            targets: [4]
        }],
        order: [[ 0, "desc" ]],
        pageLength: 10,
        lengthMenu: [
            [5, 10, 25, 50, 100],
            [5, 10, 25, 50, 100]
        ],
        autoWidth: !1,
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '{{ url('admin/order/data') }}',
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'order_id', name: 'order_id' },
            { data: 'order_by', name: 'order_by' },
            { data: 'order_status', name: 'order_status' },
            { data: 'manage', name: 'manage' }
        ]
    });
</script>
@endsection