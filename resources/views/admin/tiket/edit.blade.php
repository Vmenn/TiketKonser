    @extends('admin.body.app')

    @section('main')
    @section('title')
        Tiket - Edit
    @endsection

    <form action="{{route('tiket.update')}}" method="post"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $tiket->id }}">
        <input type="hidden" name="old_image" value="{{ $tiket->image }}">
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control " name="name" value="{{$tiket->name}}">
    </div>
    <div class="form-group mt-4">
        <label for="inputAddress2">price</label>
        <input type="number" class="form-control" id="inputEmail4" placeholder="price" value="{{$tiket->price}}"
            name="price">
    </div>
    <div class="form-group mt-4">
        <label for="inputAddress2">Event date</label>
        <input type="date"  name="event_time"  class="form-control" value="{{$tiket->event_time}}"/>
    </div>
    <div class="form-group mt-4">
        <label for="inputAddress2">Description</label>
        <textarea name="desc"  class="form-control" value="{{$tiket->desc}}"> {{$tiket->desc}}</textarea>
    </div>

    <div class="form-group mt-4">
        <label for="inputAddress2">Location</label>
        <input type="text" class="form-control" id="inputEmail4" placeholder="Location Tiket" value="{{$tiket->location}}"
            name="location">
    </div>

    <div class="form-group col-md-6">
        <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
        <input type="file" class="form-control slug-title" id="image" name="image"
            id="imageshow" onChange="mainThamUrl(this)">

        <img src="{{ asset('Upload/tiket/' . $tiket->image) }}" id="photoMain"  style="width:100px; height: 100px;"/>
    </div>

    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
    </div>
    </form>

    @prepend('addon-script')
    <script type="text/javascript">
        $(document).ready(function() {
            $('#imageshow').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#photoMain').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    @endprepend
    @endsection