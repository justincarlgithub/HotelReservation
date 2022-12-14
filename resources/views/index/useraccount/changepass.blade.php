
   <div class="container border border-primary col-6">
    <div class="card-body justify-content-center ">
      <form action="{{url('account/updatepass/'. Auth::id())}}" method="post" enctype="multipart/form-data" >
        @csrf
        @method("patch")
        <div class="row">
          <div class="col-md-12 mb-3">
            <label >Old Password: </label>
            <input type ="password" name = "oldpassword" class="form-control @error('oldpassword') is-invalid @enderror" autocomplete="new-password">
    
            @error('oldpassword')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
          <div class="col-md-12 mb-3">
            <label >New Password: </label>
          
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" onblur="myFunction4()" >
              <span id="password_er"></span>
              @error('password')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
         
          </div>
          <div class="col-md-12 mb-3">
            <label for="password-confirm" >{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                <center><span id="confirm"></span></center> 
        </div>
        </form>
          <div class="col-md-12 mb-3">
              <button type = "submit" class="btn btn-primary float-end" id="submit" disabled>Update</button>
            </div>
            
</div>
</div>
 
  </div> 
 
      
  
</div>


<script>
function myFunction4() {
var error_email = '';
var email = $('#password').val();
var _token = $('input[name="_token"]').val();
var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;

if(decimal.test(email))
{
$('#password_er').html("");
$('#password').removeClass('has-error');
$('#password').attr('style', "border-radius: 5px; border:#cacbcc 1px solid;"); 
$('#password-confirm').attr('disabled', false);
$('#submit').attr('disabled', 'disabled');

}
else
{
$('#password_er').html('<label class="text-danger"><b>Password must follow standard rules &nbsp; &#9888;</b></label>');
$('#password').addClass('has-error');
$('#password').attr('style', "border-radius: 8px; border:#FF0000 5px solid;"); 
$('#password-confirm').attr('disabled', 'disabled');
$('#submit').attr('disabled', 'disabled');
}

};
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
function checkPasswordMatch() {
var password = $("#password").val();
var confirmPassword = $("#password-confirm").val();
if (password != confirmPassword)
{
$("#confirm").html("<label class='text-danger pt-1'><b>Password does not match &nbsp; &#9888;</b></label>");
$('#submit').attr('disabled', 'disabled');
$('#password-confirm').attr('style', "border-radius: 8px; border:#FF0000 5px solid;"); 
}

else
{

$("#confirm").html("");
$('#password-confirm').attr('style', "border-radius: 5px; border:#cacbcc 1px solid;"); 
$('#submit').attr('disabled', false);
}
}
$(document).ready(function () {
$("#password-confirm").keyup(checkPasswordMatch);
});
</script>
@include('partials.footer')





