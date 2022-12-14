
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
              <th>Email</th>
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
                  {{$warn2}}
                  @if($value->id)
                   
                      <p>warning1</p>
                  
                      <p>warn2</p>
                    @else
                       <p>warn3</p>
                    @endif
                  
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


        
