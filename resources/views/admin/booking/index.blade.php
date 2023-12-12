@include('admin.sidebar')
<div id="layoutSidenav_content">
    <main>
        <br>
        <div class="container-fluid px-4">
          <div class="card">
            <div class="card-header">
              <h1>Room Reservation<a href="{{url ('index/room') }}" class = "btn btn-primary btn sm text-white float-end mdi mdi-plus-circle-outline menu-icon" > Add Reservation</a></h1>
              @include('admin.booking.action')
            </div>
            <div class="card-body shadow" data-bs-spy="scroll" style="overflow-x: auto;">
              @if (session('message'))
              <div class="alert alert-success" >{{session('message')}}</div>
              @endif
              <table class = "table table-bordered">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Booked By</th>
                    <th>Booked Room</th>
                    <th>Check-in </th>
                    <th>Check-out</th>
                    <th>Checking Status</th>
                    <th>Payable Amount</th>
                    <th>Action</th>
                 
                  </tr>
                </thead>
                <!--<tr><div class="float-right">  $roomreservation->links() }}</div><br></tr> -->
                <tbody>
                  @if(!empty($roomreservation) && $roomreservation->count())
              @foreach($roomreservation as $key => $value)
                    <tr>
                      <td><b>{{++$i}}</b></td>
                      <input type="hidden" name="booking_id" id="booking_id" value="{{$value->id}}">
                      <td class="text-capitalize">{{$value->lastname}}, {{$value->firstname}}</td>
                      <td>{{ $value->name}}</td>
                      <td>{{ $value->check_in }}</td>
                      <td>{{ $value->check_out}}</td>
                      <td>
                        @if($value->status==0)
                          @if($value->check_in == $todayDate = date("Y-m-d")) 
                          <center><span style="color:red">----------------</span>&nbsp;&nbsp;&nbsp;<a href="{{url('admin/updatestatus/'.$value->id)}}" onclick="confirmation(event)"><i class="fa-solid fa-pen-to-square"></i></center> 
                          @elseif ($value->check_in < $todayDate = date("Y-m-d"))
                          <center><button class="btn btn-danger"><a href="{{url('admin/update-redtagged/'.$value->id)}}">REDTAGGED</a></center></button>
                           @else 
                          <center><span style="color:red">-----------------------</span></center>
                          @endif 
                        @endif
                      </td>
                      <td>&#8369; {{number_format($value->total)}} </td>
                      <td>
                          <a href="{{url ('reservation/booking/'.$value->id) }}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a> || 
                          <a href="booking/delete/{{$value->id}}" onclick="confirmation1(event)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                      </a>
                      </a>
                      </td>
                    </tr>
              @endforeach
              @else
                      <tr>
                          <td colspan="10"><h1>No Checkin</h1></td>
                      </tr>
                     
              @endif
             <tr>{{ $roomreservation->links() }}</tr><br>
                </tbody>
              </table>
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
        
