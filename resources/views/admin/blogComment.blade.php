@extends('admin.layouts.default')

@section('css_before')
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/dataTables.bootstrap4.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/magnific-popup/magnific-popup.css') }}">
<link rel="stylesheet" href="{{ asset('js/plugins/datatables/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
    <!-- Page Content -->
    <div class="content">
        <h2 class="content-heading pt-0">Blog Comments</h2>

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
            <div class="block-header block-header-default">
                <h3 class="block-title">{{ $blog->title }}</h3>
                <a href="{{ url('admin/blog') }}" class="btn btn-alt-danger">Back</a>
            </div>
            <div class="block-content block-content-full">
                <table class="table table-bordered table-hover table-vcenter js-dataTable-full" id="dataTable">
                    <thead>
                        <tr>
                            <th>Date Time</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Website</th>
                            <th>Comment</th>
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
<script src="{{ asset('js/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script>
	jQuery("#dataTable").dataTable({
        columnDefs: [{
            orderable: !1,
            targets: [5]
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
        ajax: '{{ url('admin/blog/'.$blog->id.'/commentData') }}',
        columns: [
            { data: 'created_at', name: 'created_at' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'website', name: 'website' },
            { data: 'comment', name: 'comment' },
            { data: 'manage', name: 'manage' }
        ]
    });
</script>
@endsection