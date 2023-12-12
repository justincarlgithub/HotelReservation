<div class="row px-5 py-2">
    @if(!empty($recent) && $recent->count())
            @foreach($recent as $key => $value)
            <div class="row justify-content-center">
            
            <a href="view-invoice-pdf/{{$value->slug}}" target="_blank" class="btn d-flex justify-content-center col-6 p-2 me-2 " style="background-color: #060e4d; color:#fff; border-radius:10px; width:45%;">View Invoice</a>
            <a href="generate-invoice-pdf/{{$value->slug}}" class="btn d-flex justify-content-center col-6" style="background-color: #060e4d; color:#fff; border-radius:10px; width:45%;">Print Invoice</a>
            </div>
          
    <div class="col-6">
            <h5 class="text-capitalize fw-bold">
            
                <b>{{++$i}}</b> <br> <br>
                    Room Number : <span class="fw-normal">  {{ $value->room->RoomNo}}</span><br> <br>
                    Room Name : <span class="fw-normal">  {{ $value->room->name}}</span><br> <br>
                 
                    Check in :<span class="fw-normal"> {{ $value->check_in}}</span><br> <br>
                    Check out :<span class="fw-normal"> {{ $value->check_out}} </span><br> <br>
                    Amount to be Paid: <span class="fw-normal">&#8369; {{number_format($value->total)}}</span> <br> <br>
            </h5>          
    </div>    
 
<div class="col-6">
    <div class="float-sm-right">
        <br><br>
        <br><br>
        <a href="{{url ('reservation/booking/'.$value->id) }}" class="btn" style=" background-color:#060e4d; color:#fff;">Edit Booking</a> 
            <?php $date = date('Y-m-d');
            $newdate = date('Y-m-d', strtotime($date.' + 4 days')); ?>
                @if($value->check_in <= $newdate )
                        <button class="btn btn-danger" disabled>Cancel Booking</button>
                        <p style="color: red">Cancelation of booking 5 days prior to check in date is not possible</p>
                @else 
                        <a type="button" href="{{url ('reservation/delete/'.$value->id) }}" class="btn btn-danger" onclick="confirm(event)">Cancel Booking</a>
                 @endif 
     </div>
</div>
@endforeach
@else
        <tr>
            <td colspan="10">No booking yet.</td>
        </tr>
    @endif
</div>        
<div class=" d-flex justify-content-center col-md-12" style="z-index: 50;"> {{ $recent->links() }}</div>




<script>
    function confirm(ev) {
        ev.preventDefault();
        var urlToRedirect = ev.currentTarget.getAttribute('href')
            console.log(urlToRedirect);
                swal({
                    title: "Are you sure to cancel this booking?",
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