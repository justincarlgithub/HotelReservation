<div class="container mt-5">
    @php
      use App\Models\Room;
    @endphp
  @extends('partials.userheader')
  @section('title') {{$room->name}} @endsection
  @extends('admin.booking.confirm')


<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container">
              <header class="blog-header py-3">
                <div class="row flex-nowrap justify-content-between ">
                  <div class="col-4 pt-1">
                    <a class="text-muted" href="#"><h1>Confirm Reservation</h1></a>
                  </div>
                </div>
              </header>
            </div>
        
            <main role="main" class="container">
              <div class="row">
                <div class="col-md-8 blog-main">
                  <h3 class="pb-3 mb-4 font-italic border-bottom">
                    Your Reservation
                    
                  </h3>
        
                </div>
                <div class="col-md-8 blog-main">
                  <h4 class="pb-3 mb-4 border-bottom">
                    Dates
                  </h4>
                </div>
        
                <aside class="col blog-sidebar">
                  <div class="p-3 mb-3 bg-light rounded">
                    <h4 class="font-italic">{{$room->name}}</h4>
                    <img src="{{asset('uploads/category/'.$room->image)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 25px;"> </a>
               </div>
        
                  <div class="p-1">
                    <hr><br>
                    <h4 class="font-italic">Price Details</h4>
                    <ol class="list-unstyled mb-0"> <br>
                      <a>&#8369;{{ $room->price}} x <p id="night"></p> <p id="result1"></p></a>
                      <li><a href="#">Tour</a></li>
                      <br><hr><br>
                      <li><h3><b>Total</b> <b><p id="result1"></p></b></h3></li>
                    </ol>
                    
                    <form action="{{url ('reservation/add/')}}" method="POST">
                      @csrf
                        <input type="text" value={{ $room->id}} name="room_id"> 
                        <input type="text" value={{ $room->price}} name="price" id="price"> 
                        <input type="text"  name="days" id="days" > 
                        <input type="text"  name="total" id="total" >
                      <div class="form-row">
                              <input type="hidden" name="check_in" class="form-control" id="checkin" min="<?php echo date("Y-m-d"); ?>"/> 
                              <p class="help-block text-danger"></p>
                              <input type="hidden" name="check_out" class="form-control" id="checkout" min="<?php echo date("Y-m-d"); ?>"/>
                              <p class="help-block text-danger"></p>
                      </div>
                      <div class="control-group">
                          <label>Special Request</label>
                          <input type="text" class="form-control" id="req" name="request" placeholder="E.g. Special Request" />
                          <p class="help-block text-danger"></p>
                      </div>
                    <button type="submit" class="btn btn-primary">Reserve Now</button>
                    </form>
                  </div>
        
                </aside><!-- /.blog-sidebar -->
        
              </div><!-- /.row --> </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Add Tour Packages</button>
          </div>
        </div>
      </div>
    </div>

      <!-- Modal -->
  


<script>
function myFunction() {
  var x = document.getElementById("check_in").value;
  var y = document.getElementById("check_out").value;
  var s = document.getElementById("request").value;
  document.getElementById("req").value = s;
  document.getElementById("checkin").value = x;
  document.getElementById("checkout").value = y;

  var in_date = new Date(document.getElementById('check_in').value);
  var out_date = new Date(document.getElementById('check_out').value);
    //Here we will use getTime() function to get the time difference
    var time_difference = out_date.getTime() - in_date.getTime();
    //Here we will divide the above time difference by the no of miliseconds in a day
    var days_difference = time_difference / (1000*3600*24);
    //alert(days);
    
    var pay = document.getElementById('price').value;
    document.getElementById('days').value = days_difference;
    document.getElementById('price').value =pay; 

    var payment = parseFloat(document.getElementById('price').value);
    document.getElementById('total').value = days_difference * payment; 
    

    var number = days_difference * payment; 
    var fixedNum = number.toFixed(2);
    document.getElementById('result1').innerHTML = fixedNum;
    
    document.getElementById('night').innerHTML = days_difference;
}
</script>

