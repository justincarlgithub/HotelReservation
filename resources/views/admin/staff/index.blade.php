
@include('admin.sidebar')
<div id="layoutSidenav_content">
    <main>
        <br>
<div class="container-fluid px-4">
    <div class="card">
      <div class="card-header">
        <h1>Staffs
          @if(Auth::user()->role == '2')
           <a href ="{{ url ('admin/add-staff')}}" class = "btn btn-primary btn sm text-white float-end mdi mdi-plus-circle-outline menu-icon"> Add Staff</a>
           @endif
        </h1></div>
      
      <div class="table-responsive card-body shadow">
        <table class="table table-bordered" id="example2">
          <thead>
            <tr>
              <th>No.</th>
              <th>Profile</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
              @if(Auth::user()->role == '2')
              <th>Action</th>
              @endif
            </tr>
          </thead>
          <tbody>
                    
            @if(!empty($staff) && $staff->count())
        @foreach($staff as $key => $value)
              <tr>
                <td><b>{{++$i}}</b></td>
                <td><img src="{{asset('uploads/profile/'.$value->profile_image)}}"   class="card-img-top" alt="Image"></td>
                <td>{{ $value->firstname}}</td>
                <td>{{ $value->lastname}}</td>
                <td>{{ $value->email}}</td>
             
                @if(Auth::user()->role == '2')
                <td>
                <a href = "edit-staff/{{$value->slug}}" class="btn btn-success" ><i class="fa-solid fa-pen-to-square"></i></a> || 
                <a href = "delete-staff/{{$value->slug}}" class="btn btn-danger deletebutton" ><i class="fa-solid fa-trash"></i></a>
              </td>
              @endif
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
       $('#example2').DataTable();
   } );
</script>


        
