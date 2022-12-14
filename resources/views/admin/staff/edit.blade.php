@include('admin.sidebar')
<div id="layoutSidenav_content">
    <main>
        <br>
        <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
       
      <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    
                    <div class="card-header">
                        <h3>Add Staff 
                        <a href ="{{ url ('admin/staff')}}" class = "btn btn-danger btn-sm float-end mdi mdi-reply menu-icon"> BACK</a>
                    </h3>
                  </div> 
                    <div class="callout" data-closable>
                        @if(Session::has('success'))
                      <div class="alert alert-success">
                        <p><strong>{{ Session::get('success') }}</strong></p>  
                      </div>
                      @endif
                      </div>
                            <div class="card-body">
                                <form action="{{url ('admin/edit-staff-password/'.$user->id)}}" method="POST" >
                                            
                                    @csrf
                                    @method("put")
                                    <div class="row mb-3">
                                      <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('New Password') }}</label>
          dsdsds
                                      <div class="col-md-6">
                                          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" onblur="myFunction4()" >
                                          <span id="password_er"></span>
                                          @error('password')
                                              <span class="invalid-feedback" role="alert">
                                                  <strong>{{ $message }}</strong>
                                              </span>
                                          @enderror
                                      </div>
                                  </div>
            
                                    <div class="row mb-3">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
            
                                        <div class="col-md-6">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                                        </div> <br>
                                       <center><span id="confirm"></span></center> 
                                    </div>
            
                                    <div class="row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            <button type="submit" class="btn btn-primary" id="submit" disabled>
                                                {{ __('Change Password') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </div>
            </div>
        </div>
    </div>
    </div></div>
</main>
  </div>

  <script>
    function myFunction4() {
          var error_email = '';
          var email = $('#password').val();
          var _token = $('input[name="_token"]').val();
          var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
          
           if(decimal.test(email))
              {
                $('#password_er').html('<label></label>');
                $('#password').removeClass('has-error');
                $('#password').attr('style', "border-radius: 5px; border:#cacbcc 1px solid;"); 
                $('#submit').attr('disabled', 'disabled');
                
              }
              else
              {
                $('#password_er').html('<label class="text-danger"><b>Password too weak &nbsp; &#9888;</b></label>');
                $('#password').addClass('has-error');
                $('#password').attr('style', "border-radius: 8px; border:#FF0000 5px solid;"); 
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
        
