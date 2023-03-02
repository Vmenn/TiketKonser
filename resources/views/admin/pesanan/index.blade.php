@extends('admin.body.app')

@section('main')
@section('title')
    Tiket - Dashboard
@endsection
<section class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="mb-3">
                   
                            
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0 crudTable">
            <thead>
                <tr>
                    <th>ID Konser</th>
                    <th>Name</th>
                    <th>Order Number</th>
                    <th>Price</th>
                    <th>No KTP</th>
                    <th>email</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                

            </tbody>
        </table>
    </div>
</section>

@prepend('addon-script')
    <script>

    // AJAX DataTablenn
    var datatable = $('.crudTable').DataTable({
        processing: true,
        serverSide: true,
        ordering: true,
        ajax: {
            url: '{!! url()->current() !!}',
        },
        columns: [
            { data: 'tiket_id', name: 'tiket_id' },
            { data: 'last_name',name: 'last_name' },
            { data: 'order_number', name: 'order_number' },
            { data: 'first_name', name: 'first_name' },
            { data: 'no_ktp', name: 'no_ktp' },
            { data: 'email', name: 'email' },
            { data: 'status', name: 'status' },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '15%'
            },
        ]
    });
</script>
@endprepend
@endsection