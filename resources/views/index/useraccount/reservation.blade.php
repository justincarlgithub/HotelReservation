@php
use App\Models\Room;
@endphp
  <div class="row auto">
    <div class="col-md-8">
      <h1>{{$room->name}}</h1>
    </div>
  </div>
  <div class="section">
    <div class="container">
      <div class="p-2 rounded bg-white">
        <div class="row">
          <div class="col-5">
            <img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 25px;" width="100" height="350"> </a>
          
          </div>
          <div class="d-none d-md-block col-7">
            <div class="row row-cols-2">
              <div class="col"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 25px;" width="75" height="175"> </a>
              </div>
              <div class="col"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 25px;" width="80" height="175"> </a>
              </div>
              <div class="col"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 25px;" width="80" height="175"> </a>
              </div>
              <div class="col"><img src="{{asset('uploads/category/'.$room->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 25px;" width="80" height="175"> </a>
              </div>
            </div>
          </div>
        </div>
        </div>
    </div>
  </div>

  <div class="row g-5">
    <div class="col-md-8">
      @yield('content')
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
              <div class="control-group col-6">
                  <label>Check-In</label>
                  <input type="date" name="check_in" id="check_in" class="form-control" min="<?php echo date("Y-m-d"); ?>" value="{{$room->check_in}}" disabled>
                  <span id="error_checkin"></span> 
              </div>
              <br>
              <div class="control-group col-6">
              <label>Check-Out</label>
              <input type="date" name="check_out" id="check_out" class="form-control" min="<?php echo date("Y-m-d");?>" onBlur="myFunction()" value="{{$room->check_out}}" required/>
              
            </div>
            <br>
          <div class="control-group">
              <label>Special Request</label>
              <input type="text" class="form-control" id="request" placeholder="E.g. Special Request"  data-validation-required-message="Please enter your special request" />
              <p class="help-block text-danger"></p>
          </div>
        </div>
            <input type="hidden" value={{ $room->id}} name="room_id" id="room_id"> 
         <center>
                 <a href="{{url ('package') }}" class="btn btn-primary" onclick="myFunction()" id="su"> Reserve </a>
                 <button class="btn btn-primary" data-bs-toggle="modal" href="#exampleModalToggle" onclick="myFunction()" id="su" >Reserve</button> 
        </center> 
       
      </form>
          <br>
          <div class="float-start" >&#8369;{{number_format($room->price)}} x cleo </div>
          <div class="float-end ">Pere</div>
          <br><hr><br>
          <div class="mx-auto">
            <h2><b>Total : &#8369;</b></h2><hr>
          </div>
          
        </div>
      </div>
    </div>
  </div>

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
  $(document).ready(function(){
  
   $('#check_in').blur(function(){
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
            $('#check_in').attr('style', "border-radius: 5px; border:#cacbcc 1px solid;"); 
            $('#su').attr('disabled', false);
          }
          else
          {
            $('#error_checkin').html('<label class="text-danger"><b>Date unavailable &emsp; &#9888;</b></label>');
            $('#check_in').addClass('has-error');
            $('#check_in').attr('style', "border-radius: 8px; border:#FF0000 5px solid;"); 
            $('#su').attr('disabled', 'disabled');
          }
      }
     })
   });
  });
</script>
<script>
$(document).ready(function(){

 $('#check_out').blur(function(){
  var error_checkout = '';
  var check_in = $('#check_in').val();
  var check_out = $('#check_out').val();
  var _token = $('input[name="_token"]').val();
   $.ajax({
    url: "{{url ('datecheck1') }}",
    method:"POST",
    data:{check_in:check_in,check_out:check_out, _token:_token},
    success:function(result)
    {
        if(result == 'invalid')
        {
        $('#error_checkout').html('<label></label>');
        $('#check_out').removeClass('has-error');
        $('#check_out').attr('style', "border-radius: 5px; border:#cacbcc 1px solid;"); 
        $('#su').attr('disabled', false);
        }
        else
        {
        $('#error_checkout').html('<label class="text-danger"><b>Date unavailable &emsp; &#9888;</b></label>');
        $('#check_out').addClass('has-error');
        $('#check_out').attr('style', "border-radius: 8px; border:#FF0000 5px solid;"); 
        $('#su').attr('disabled', 'disabled');
        }
    
    }
   })
 });
});
</script>

<script>
 let check_in =  document.querySelector('#check_in');
 let check_out = document.querySelector('#check_out');

check_in.addEventListener('change', function() {
  check_out.min = this.value;

});
</script>