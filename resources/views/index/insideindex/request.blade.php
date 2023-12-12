


  <div class="row auto">
    
    <div class="col-md-8">
      
      <h1><span style="font-size: 25px;" class="pb-3"><a class="fa-solid fa-chevron-left" href="{{url('index/room')}}" style="color: #060e4d;"></a> </span> {{$room->name}}</h1>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="p-5 rounded" >
        <div class="row">
          <div class="col-md-12 d-none d-sm-none d-lg-block d-xl-block col-lg-5">
            <img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 0px 0px 0px 0px;" width="100" height="350"> </a>
          
          </div>
          <div class="d-sm-none d-none   d-lg-block d-xl-block col-md-7">
            <div class="row row-cols-2" style="--bs-gutter-x: 0;">
              <div class="col"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style=" padding:3px;" width="80" height="175"> </a>
              </div>
              <div class="col"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 0px 25px 0px 0px; padding:3px;" width="80" height="175"> </a>
              </div>
              <div class="col"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="padding:3px;" width="80" height="175"> </a>
              </div>
              <div class="col"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 0px 0px 25px 0px; padding:3px;" width="80" height="175"> </a>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>

    <div class="container-fluid col-12 d-lg-none ">
      <img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 5px 5px 5px 5px;" width="100" height="350"> </a>
      <a type="button" class="batn d-lg-none  justify-content-between col-3 " data-bs-toggle="modal" data-bs-target="#exampleModal" style="background-color: rgb(6, 14, 77, 0.3); color:#fff; ">
        <i class="fa-solid fa-image"></i> View Photos
      </a>
    </div>

   
<!-- Button trigger modal -->



  <div class="row g-5" style="padding: 20px;">
    <div class="col-md-8">

    <h2 class="blog-post-title"><strong><span style="color:brown;">Booking</span> Coverage</strong></h2>

        <p>Every booking includes free protection from Host cancellations, listing inaccuracies, and other issues like trouble checking in.</p>
        <div class="row">
        <div class="col-md-6">
        <h3>Booking Protection Guarantee</h3>
        <p> <em>In the unlikely event a Host needs to cancel your booking within 30 days of check-in, weâ€™ll find you a similar or better home, or weâ€™ll refund you.</em></p>
        </div>
        <div class="col-md-6">
        <h3>Booking Protection Guarantee</h3>
        <p> <em>In the unlikely event a Host needs to cancel your booking within 30 days of check-in, weâ€™ll find you a similar or better home, or weâ€™ll refund you.</em></p>
        </div>
        </div>

        <div class="row">
        <div class="col-md-6">
        <h3>Booking Protection Guarantee</h3>
        <p> <em>In the unlikely event a Host needs to cancel your booking within 30 days of check-in, weâ€™ll find you a similar or better home, or weâ€™ll refund you.</em></p>
        </div>

        <div class="col-md-6">

        <h3>Booking Protection Guarantee</h3>
        <p> <em>In the unlikely event a Host needs to cancel your booking within 30 days of check-in, weâ€™ll find you a similar or better home, or weâ€™ll refund you.</em></p>
        </div>
        </div>
        <hr>

        <h2 class="blog-post-title">What this Room offer</h2>

        <ul class="row">
        <div class="col-md-6">
          <li>Kitchen</li>
          <li>Wifi</li>
          <li>Dedicated workspace</li>
          <li>Free street parking</li>
          <li>Pool</li>
        </div>
        <div class="col-md-6">
          <li>TV with standard cable</li>
          <li>Elevator</li>
          <li>Air conditioning</li>
          <li>Patio or balcony</li>
          <li>Carbon monoxide alarm</li>
        </div>
        </ul>
        <h2>Available Dates</h2>
        <div id="calendar"></div>
        <hr>
        <h2 class="blog-post-title"><strong>Things to Know!</strong></h2>
      <article class="blog-post">
        <h3 class="blog-post-title">House Rules</h2>
        <p class="blog-post-meta">Management Requirements by<a>Southern Leyte State University</a></p>

        <ul>
          <li><strong>Check-in:</strong>: After<em>7:00 pm</em></li>
          <li><strong>Check-out:</strong>: After<em>11:00 am</em></li>
        </ul>
        

        <h3 class="blog-post-title">Health and Safety</h2>

        <ul>
          <li>Airbnb's COVID-19 safety practices</li>
          <li>Carbon monoxide alarm not reported</li>
          <li>Smoke alarm</li>
        </ul>
        
       
        <h3 class="blog-post-title">Cancellation Policy</h2>

        <p>Cancel before check-in on Nov 16 for a partial refund.Review the Hostâ€™s full cancellation policy which applies even if you cancel for illness or disruptions caused by COVID-19.</p>
        <hr>
       
    </div>
    <div class="col-md-4">
      <div class="position-sticky border border-dark rounded" style="top: 2rem;">
        <div class="p-4 mb-3 bg-light rounded">
          <h3>
            &#8369; {{number_format($room->price)}}<small class="text-muted fs-6">night</small>
          </h3>
        </div>
       
        <div class="px-4">
            @csrf
            <div class="form-row">
              <div class="control-group col-12">
                <span id="error_checkin2"></span> 

                  <label>Check-In</label>
                  <input type="date" name="check_in" id="check_in" class="form-control" min="<?php echo date("Y-m-d"); ?>" oninput="myFunction3()"  >
                  <span id="error_checkin"></span> 
                 
              </div>
              <br>
              <div class="control-group col-12">
              <label>Check-Out</label>
              <input type="date" name="check_out" id="check_out" class="form-control" oninput="myFunction2()"  disabled />
              <span id="error_checkout"></span> 
             
            </div>
            <br>
           
          <div class="control-group">
              <label>Special Request</label>
              <input type="text" class="form-control" id="request" placeholder="E.g. Special Request" name="req"  value="{{ old('req') }}"/>
              <p class="help-block text-danger"></p>
          </div>
        </div>
            <input type="hidden" value={{ $room->id}} name="room_id" id="room_id"> 
         <center>
          <input style="background-color:#060e4d; color:#fff;"type="button" class="btn" data-bs-toggle="modal" href="#exampleModalToggle"  id="su" value="Reserve" disabled>
         
        </center> 
       
      </form>
          <br>
          <div>
            <input type="hidden" value={{ $room->price}} name="price" id="price"> 
             <div><a id="p"></a> <a id="diff"></a>
              <div class="float-end"> <a id="demo1"></a></div>
            </div>
             
          </div>
         
          <br><br>
          <div class="mx-auto">
            <h2 id="demo" class="fw-bold"></b></h2> <br>
          </div>
         
        </div>
      </div>
    </div>
  </div>

 
<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$room->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row row-cols-2" style="--bs-gutter-x: 0;">
          <div class="col-md-7"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style=" padding:3px;" width="80" height="220"> </a>
          </div>
          <div class="col-md-5"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 0px 0px 0px 0px; padding:3px;" width="80" height="220"> </a>
          </div>
          <div class="col-md-5"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="padding:3px;" width="80" height="220"> </a>
          </div>
          <div class="col-md-7"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 0px 0px 0px 0px; padding:3px;" width="80" height="220"> </a>
          </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.nl.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet"/>
<script>
  $('#calendar').datepicker({
  language: "en", 
  todayHighlight: true,
    format: 'yyyy-mm-dd',
    startDate: '0d',
});
 
</script>
<style>
  .calendar td,th{
    text-align: center !important;
    padding: 12px 20px  !important;
    font-size: 14px !important;
}
.datepicker table tr td.disabled,
.datepicker table tr td.disabled:hover {
    color: rgb(192, 192, 192) !important;
   
    height: 45px !important;
    width: 20px !important;
    cursor: not-allowed !important;
    border-radius: 50% !important;
    background:rgb(229, 228, 226) !important;
    text-decoration: line-through !important;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script type="text/javascript">
  var proposal_from = document.getElementById("check_in");
  var proposal_to = document.getElementById("check_out");

  function setFromDate() {
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var minY = today.getFullYear();
  var maxY = today.getFullYear() + 1;

  var minimum = minY + '-' + mm + '-' + dd;
  var maximum = maxY + '-' + mm + '-' + dd;
  console.log(minimum)
  proposal_from.min = minimum;
  proposal_from.max = maximum;
}

setFromDate();

proposal_from.addEventListener("change", function () {
  var date = proposal_from.value.split("-");
  var from_dd = date[2];
  var from_mm = date[1];
  var from_Y = date[0];

  from_dd++;
  var min_to_dd = String(from_dd).padStart(2, '0')
  var min_to_mm = from_mm;
  var min_to_Y = from_Y;

  from_Y++;
  var max_to_dd = String(from_dd).padStart(2, '0')
  var max_to_mm = from_mm;
  var max_to_Y = from_Y;

  var minimum = min_to_Y + '-' + min_to_mm + '-' + min_to_dd;
  var maximum = max_to_Y + '-' + max_to_mm + '-' + max_to_dd;

  proposal_to.min = minimum;
  proposal_to.max = maximum;
});

</script>

<script>
function myFunction3() {
    
   

    var error_checkin = '';
    var check_in = $('#check_in').val();
    var room_id = $('#room_id').val();
    var _token = $('input[name="_token"]').val();
     $.ajax({
      url: "{{url ('datecheck') }}",
      method:"POST",
      data:{check_in:check_in,room_id:room_id, _token:_token},
      success:function(result)
      {
          if(result == 'unique')
          {
            $('#error_checkin').html('<label></label>');
            $('#check_in').removeClass('has-error');
            $('#error_checkin2').html('<label></label>');
            $('#check_in').attr('style', "border-radius: 5px; border:#cacbcc 1px solid;"); 
            $('#check_out').attr('disabled', false);
            $('#su').attr('disabled', 'disabled');
            
          }
          else
          {
            $('#error_checkin').html('<label class="text-danger"><b>Date unavailable &nbsp; &#9888;</b></label>');
            $('#error_checkin2').html('<label class="text-danger">*Check calendar on the left for your reference.</label>');
            $('#check_in').addClass('has-error');
            $('#check_in').attr('style', "border-radius: 8px; border:#FF0000 5px solid;"); 
            $('#su').attr('disabled', 'disabled');
          }
      }
     })
   };
</script>
<script>
  function myFunction2() {
    var x = document.getElementById("check_out").value;
    var z = document.getElementById("check_in").value;
    var in_date = new Date(document.getElementById('check_in').value);
    var out_date = new Date(document.getElementById('check_out').value);
    //Here we will use getTime() function to get the time difference
    var time_difference = out_date.getTime() - in_date.getTime();
    //Here we will divide the above time difference by the no of miliseconds in a day
    var days_difference = time_difference / (1000*3600*24);
    //alert(days);
    
    var pay = document.getElementById('price').value;
    document.getElementById("p").innerHTML = "&#8369;" + pay.toLocaleString() + " x"
   
    var payment = parseFloat(document.getElementById('price').value);
    document.getElementById("diff").innerHTML = days_difference + " nights"; 
    

    var number = days_difference * payment; 
    var fixedNum = number.toFixed(2);
    document.getElementById('result1').innerHTML = fixedNum;

    var x = document.getElementById("check_out").value;
    document.getElementById("demo1").innerHTML = "&#8369;" + (days_difference * payment).toLocaleString();
    document.getElementById("demo").innerHTML ="TOTAL: " + "&#8369;" + (days_difference * payment).toLocaleString();

    var error_checkout = '';
    var check_in = $('#check_in').val();
    var check_out = $('#check_out').val();
    var room_id = $('#room_id').val();
    var _token = $('input[name="_token"]').val();
     $.ajax({
      url: "{{url ('outdate') }}",
      method:"POST",
      data:{check_in:check_in,check_out:check_out,room_id:room_id, _token:_token},
      success:function(result)
      {
          if(result == 'unique')
          {
            $('#error_checkout').html('<label></label>');
            $('#error_checkin2').html('<label></label>');
            $('#check_out').removeClass('has-error');
            $('#check_out').attr('style', "border-radius: 5px; border:#cacbcc 1px solid;"); 
            $('#su').attr('disabled', false);
            
          }
          else
          {
            $('#error_checkin2').html('<label class="text-danger">*Check calendar on the left for your reference.</label>');
            $('#error_checkout').html('<label class="text-danger"><b>Date unavailable &nbsp; &#9888;</b></label>');
            $('#check_out').addClass('has-error');
            $('#check_out').attr('style', "border-radius: 8px; border:#FF0000 5px solid;"); 
            $('#su').attr('disabled', 'disabled');
          }
      }
    })

    
  }
  </script>
<script src="https://kit.fontawesome.com/388c1109a3.js" crossorigin="anonymous"></script>
<style>
  .container .batn {
  position: absolute;
  top:65%;
  left:50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  background-color: #555;
  color: white;
  font-size: 16px;
  padding: 12px 24px;
  border: none;
  cursor: pointer;
  border-radius: 5px;
  text-align: center;
}
</style>