@section('content')
  <div class="container-fluid px-4">
    <div class="card">
      <div class="card-header">
        <h1>Room Reservation<a href="{{url ('index/room') }}" class = "btn btn-primary btn sm text-white float-end" >Add Reservation</a></h1>
        @include('admin.booking.action')
      </div>
      <div class="card-body" data-bs-spy="scroll">
        @if (session('message'))
        <div class="alert alert-success" >{{session('message')}}</div>
        @endif
        <table class = "table table-bordered">
          <thead>
            <tr>
             
              <th>No.</th>
              <th>Booking ID</th>
              <th>Booked By</th>
              <th>Booked Room</th>
              <th>Check-in </th>
              <th>Check-out</th>
              <th>Checking Status</th>
              <th>Payable Amount</th>
              <th>Payment Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <!--<tr><div class="float-right">  $roomreservation->links() }}</div><br></tr> -->
          <tbody>
            @if(!empty($roomreservation) && $roomreservation->count())
        @foreach($roomreservation as $key => $value)
              <tr>
                <td><b>{{++$i}}</b></td>
                <td name="booking_id" id="booking_id">{{$value->id}}</td>
                <td class="text-capitalize">{{$value->lastname}}, {{$value->firstname}}</td>
                <td>{{ $value->name}}</td>
                <td>{{ $value->check_in}}</td>
                <td>{{ $value->check_out}}</td>
                <td></td>
                <td>&#8369; {{number_format($value->total)}}</td>
                <td> <a href="{{ route('admin.transaction', $value->id) }}"  onclick="myFunction()" class="btn btn-info">UNPAID
                 </a>
                  </td> 
                <td>
                    <a href="{{url ('admin/booking/'.$value->id) }}"><i class="fa-solid fa-pen-to-square"></i></a> || 
                    <a href="booking/delete/{{$value->id}}"onclick="confirmation(event)"><i class="fa-solid fa-trash"></i></a>
                </a>
                </a>
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
@endsection




<script>
    function confirmation(ev) {
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

<script type="text/javascript">
       
  $(document).ready(function () {
      
      $('body').on('click', '#update', function () {
        var userURL = $(this).data('url');
        $.get(userURL, function (data) {
            $('#staticBackdropl').modal('show');
            $('#value-id').text(data.id);
        })
     });
      
  });
 
</script>


 
</body>
</html>
<!-- Button trigger modal -->

  
  