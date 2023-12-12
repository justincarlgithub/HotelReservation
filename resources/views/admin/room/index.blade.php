@include('admin.sidebar')
<div id="layoutSidenav_content">
    <main>
        <br>
<div class="container-fluid px-4">
    <div class="card">
      <div class="card-header">
        <h1>Rooms<a href ="{{ url ('admin/add-room')}}" class = "btn btn-primary btn sm text-white float-end mdi mdi-plus-circle-outline menu-icon"> Add Room</a></h1>
      </div>
      @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
              <strong>{{ $message }}</strong>
      </div>
  @endif
        <div class="table-responsive card-body shadow">
          <table class="table" id="example">
            <thead>
              <tr>
                <th>Room No.</th>
                <th>Image</th>
                <th>Room Name</th>
                <th>Room Price</th>
                <th>Room Decription</th>
                <th>Action</th>
              </tr>
          </thead>
          <tbody>
            @if(!empty($room) && $room->count())
        @foreach($room as $key => $value)
              <tr>
                <td><b>{{ $value->RoomNo}}</b></td>
                <td><img src="{{asset('uploads/category/'.$value->profile)}}" width="50px" height="50px"  class="card-img-top" alt="Image"></td>
                <td>{{ $value->name}}</td>
                <td>&#8369; {{ $value->price}}</td>
                <td>{{ $value->description}}</td>
                <td>
                  <a href="edit-room/{{$value->slug}}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a> || 
                  <a href="delete/{{$value->slug}}" class="btn btn-danger deletebutton"><i class="fa-solid fa-trash"></i></a>
                </td>
                 
              </tr>
              @endforeach
              @else
                <tr>
                    <td colspan="10"><h1>No rooms added</h1></td>
                </tr>
            @endif
          </tbody>
          </table>
        </div>

        </div>
       
        
      </div>
   </div>
</main>
  </div>
   <script>
            function confirmation1(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href')
                console.log(urlToRedirect);
                swal({
                    title: "Are you sure to delete this booking?",
                    text: "Action can't be undone!",
                    icon: "warning",
                    buttons: true,
                    dangerMode:true,
                })
                .then((willCancel)=> {
                    if(willCancel) {
                        window.location.href = urlToRedirect;
                        
                    }
                });
            }
        </script>

@include('partials.footer')
<script>
  $(document).ready(function() {
       $('#example').DataTable();
   } );
</script>

