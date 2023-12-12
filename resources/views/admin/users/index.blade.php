
@include('admin.sidebar')
<div id="layoutSidenav_content">
    <main>
        <br>
<div class="container-fluid px-4">
    <div class="card">
      <div class="card-header">
        <h1>Staffs
        </h1></div>
     
      <div class="table-responsive card-body shadow">
        <table class="table table-bordered" id="example2">
          <thead>
            <tr>
              <th>No.</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
              @if ($warn > 0)
              <th>Status</th>
              @endif
              
            
            </tr>
          </thead>
          <tbody>
                    
            
        @foreach($users as $key => $value)
              <tr>
                <td><b>{{++$i}}</b></td>
                <td>{{ $value->id}}</td>
                <td>{{ $value->lastname}}</td>
                <td>{{ $value->email}}</td>
                @if ($warn>0)
                <td>
                  @foreach ($count as $countUserId => $countStatus)
                  @if($countUserId == $value->id)
                       @if($countStatus ==1)
                            <span style="color: red"><b>FIRST</b> Warning</span>
                          @elseif($countStatus ==2)
                            <span style="color: red"><b>SECOND</b> Warning</span>
                          @else
                             @if ($value->banned == 1)
                             <button class="btn btn-danger" style="pointer-events: none;">Banned</button>
                             @else
                             <a href="{{url('admin/ban-user/'. $value->id)}}" class="btn btn-danger">Block User</a>
                             @endif
                           
                      @endif
                  @endif
                    
                  @endforeach
                </td>
                @endif
            </tr>
            @endforeach
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


        
