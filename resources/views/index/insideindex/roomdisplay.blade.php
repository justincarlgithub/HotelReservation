
<div class="container mt-5">
  @php
    use App\Models\Room;
  @endphp
@extends('partials.userheader')
@extends('index.insideindex.request')

<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalToggleLabel">Tour Pacakges</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h1>We also offer tour packages</h1>
        </div>
        <div class="modal-footer">
          <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" data-bs-dismiss="modal" onclick="myFunction1()"  href="{{url ('view') }}">Proceed to Booking</button>
        </div>
      </div>
    </div>
  </div> 

  <!-- MODAL 2-->

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
                <div class="col-md-7 blog-main">
                  <h3 class="pb-3 mb-4 font-italic border-bottom">
                  Your Reservation
                    
                    
                  </h3>
        
                </div>
                
                
                
        <!-- ----------------------------- -->
        <div class="col-md-5">
      <div class="position-sticky border border-dark rounded p-4 mb-3" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
                    <h4 class="font-italic">{{$room->name}}</h4>
                    <img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 25px;"> </a>
               </div>
               <hr>
                  <div class="p-1">
                    <h4 class="font-italic">Price Details</h4><br>
                    <div class="row">
                      <div class="col-md-8">
                      <a class="justify-content-start">&#8369;{{ $room->price}} x <a id="night"></a> night</a></div>
                      <div class="col-md-4">
                      <a class="justify-content-end fw-bold">&#8369;</a><a class="justify-content-end fw-bold" id="result1"></a></div>
                       
                    </div>
                      <div class="mb-0 row">
                      <a href="#">Tour</a>
                    </div>
                      <hr>
                      <div class="row">
                      <h3 class="justify-content-start col-md-8"><b>Total</b> </h3></li>
                      
                        <a class="justify-content-end fw-bold col-md-4">&#8369;</a><a class="justify-content-end fw-bold" id="total"></a>
                    </div>
                    
                    <form action="{{url ('reservation/add/')}}" method="POST">
                      @csrf
                        <input type="hidden" value={{ $room->id}} name="room_id"> 
                        <input type="hidden" value={{ $room->price}} name="price" id="price"> 
                        <input type="hidden"  name="days" id="days" > 
                        <input type="hidden"  name="payme" id="payme" >
                      <div class="form-row">
                          <div class="control-group col-sm-6">
                             
                              
                              <input type="hidden" name="check_in" class="form-control" id="checkin" />
                              <input type="hidden" name="status"  id="staus" value="0"/> 
                              <p class="help-block text-danger"></p>
                          </div>
                          <div class="control-group col-sm-6">
                              
                              <input type="hidden" name="check_out" class="form-control" id="checkout"/>
                              <p class="help-block text-danger"></p>
                          </div>
                      </div>
                      <input type="text" name="req" class="form-control" id="req"/>
                    <button type="submit" class="btn btn-primary">Reserve Now</button>
                    </form>
</div>
                  </div>
        
</div><!-- /.blog-sidebar -->
        
              </div><!-- /.row --> </div>
          <div class="modal-footer">
            <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" data-bs-dismiss="modal">Add Tour Packages</button>
          </div>
        </div>
      </div>
    </div>
   
   
<script>
function myFunction1() {
  var x = document.getElementById("check_in").value;
  var y = document.getElementById("check_out").value;
  var z = document.getElementById("request").value;
  document.getElementById("checkin").value = x;
  document.getElementById("checkout").value = y;
  document.getElementById("req").value = z;

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
    document.getElementById('payme').value = days_difference * payment; 
    document.getElementById("total").innerHTML = days_difference * payment; 

    var number = days_difference * payment; 
    var fixedNum = number.toFixed(2);
    document.getElementById('result1').innerHTML = fixedNum.toLocaleString();
    
    document.getElementById('night').innerHTML = days_difference;
}
</script>

