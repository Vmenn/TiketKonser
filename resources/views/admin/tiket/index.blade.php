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
                    <button class="btn btn-success" data-toggle="modal" data-target="#modal-lg">Add <i
                            class="fas fa-plus"></i></button>
                            
                </div>
            </div>
        </div>
        <table class="table table-bordered table-striped mb-0 crudTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>name</th>
                    <th>price</th>
                    <th>Location</th>
                    <th>Event Date</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                

            </tbody>
        </table>
    </div>
</section>
<div class="modal fade" id="modal-lg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Large Modal</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('tiket.add')}}" method="post"  enctype="multipart/form-data">
            @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control " name="name">
        </div>
        <div class="form-group mt-4">
            <label for="inputAddress2">price</label>
            <input type="number" class="form-control" id="inputEmail4" placeholder="price"
                name="price">
        </div>
        <div class="form-group mt-4">
            <label for="inputAddress2">Event date</label>
            <input type="date"  name="event_time"  class="form-control"/>
        </div>
        <div class="form-group mt-4">
            <label for="inputAddress2">Description</label>
            <textarea name="desc"  class="form-control"></textarea>
        </div>
        <div class="form-group mt-4">
            <label for="inputAddress2">Location</label>
            <input type="text" class="form-control" id="inputEmail4" placeholder="Location Brand"
                name="location">
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4" class="form-label">Photo <span class="text-danger">*</span></label>
            <input type="file" class="form-control slug-title" id="inputEmail4" name="image"
                id="formFile" onChange="mainThamUrl(this)">

            <img src="" id="photoMain" />
        </div>

        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
        </form>
        </div>
        
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@prepend('addon-script')

<script type="text/javascript">
    function mainThamUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#photoMain').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
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
            { data: 'id', name: 'id' },
            { data: 'photo', name: 'photo' },
            { data: 'name', name: 'name' },
            { data: 'price', name: 'price' },
            { data: 'location', name: 'location' },
            { data: 'event_time', name: 'event_time' },
            
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