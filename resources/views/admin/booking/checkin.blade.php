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
              <div class="callout" data-closable>
                @if(Session::has('success'))
              <div class="alert alert-success">
                <p><strong>{{ Session::get('success') }}</strong></p>  
              </div>
              
              </div>
      @endif
              <table class = "table table-bordered" id="dataTable">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Booked By</th>
                    <th>Booked Room</th>
                    <th>Check-in </th>
                    <th>Check-out</th>
                    <th>Checking Status</th>
                    <th>Payable Amount</th>
                    @if(Auth::user()->role == '2')
                    <th>Payment Status</th>
                    @endif
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
                          <center><span style="color: red">REDTAGGED</span></center>
                           @else 
                          <center><span style="color:red">-----------------------</span></center>
                          @endif 
                        @endif
                        @if($value->status==2)
                        <center><span style="color:green">Checkout</span></center>
                        @endif
                        @if($value->status==1)
                        <center><span style="color:red"> <a>Checkin</a></center>
                        @endif
                      </td>
                      <td>&#8369; {{number_format($value->total)}}</td>
                      @if(Auth::user()->role == '2')
                      <td> 
                        @if($value->status ==1) 
                        <a href="{{url('admin/updatestatus2/'.$value->id)}}" onclick="confirmation(event)" class="btn btn-info">UNPAID</a>
                        @elseif ($value->status ==2)
                        <a class="btn btn-success"> PAID </a>
                        @else
                        <a href="{{ url('confirm-password/'.$value->id) }}" class="btn btn-sm btn-info " style="pointer-events: none;">UNPAID</a>
                        @endif
                       </td> 
                      @endif
                      <td>
                      <div class="d-flex justify-content-center">
                        <a href="{{url ('reservation/booking/'.$value->id) }}" class="btn btn-success"><i class="fa-solid fa-pen-to-square"></i></a> 
                      </div>
                      </td>
                    </tr>
              @endforeach
              @else
                      <tr>
                          <td colspan="10"><h1>No Data Available</h1></td>
                      </tr>
                     
              @endif
             <tr>{{ $roomreservation->links() }}</tr><br>
                </tbody>
              </table>
            </div>
         </div>
        </div
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
  $('#dataTable').DataTable();
});
</script>
        
