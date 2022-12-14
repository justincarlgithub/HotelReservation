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
                      
                      </div>
              @endif
                    <div class="card-body">
                        <form method="POST" action="{{ url ('admin/add-staff')}}" method="POST">
                            @csrf
    
                            <div class="row mb-3">
                                <label for="firstname" class="col-md-4 col-form-label text-md-end">{{ __('Firstname') }}</label>
    
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>
    
                                    @error('firstname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="lastname" class="col-md-4 col-form-label text-md-end">{{ __('Lastname') }}</label>
    
                                <div class="col-md-6">
                                    <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>
    
                                    @error('lastname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" oninput="myFunction4()">
                                    <span id="error_email"></span>
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
    
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
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                                <input type="hidden" name="role" value="1">
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary mdi mdi-upload menu-icon" id="submit">
                                        {{ __('Add Staff') }}
                                    </button>
                                </div>
                            </div>
                            
                         {{ csrf_field() }}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div></div>
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
        <script>
            $(document).ready(function(){
            
             $('#email').blur(function(){
              var error_email = '';
              var email = $('#email').val();
              var _token = $('input[name="_token"]').val();
              var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
              if(!filter.test(email))
              {    
               $('#error_email').html('<label class="text-danger"><b>Invalid Email &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &#9888;</b></label>');
               $('#email').addClass('has-error');
               $('#submit').attr('disabled', 'disabled');
              }
              else
              {
               $.ajax({
                url: "{{url ('email') }}",
                method:"POST",
                data:{email:email, _token:_token},
                success:function(result)
                {
                    if(result == 'unique')
                    {
                    $('#error_email').html('<label class="text-success"></label>');
                    $('#email').removeClass('has-error');
                    $('#email').attr('style', "border-radius: 5px; border:#cacbcc 1px solid;"); 
                    $('#submit').attr('disabled', false);
                    }
                    else
                    {
                    $('#error_email').html('<label class="text-danger"><b>Email Already in use  &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &emsp; &#9888;</b></label>');
                    $('#email').addClass('has-error');
                    $('#email').attr('style', "border-radius: 8px; border:#FF0000 5px solid;"); 
                    $('#submit').attr('disabled', 'disabled');
                    }
                
                }
               })
              }
             });
             
            });
            </script>
        
@include('partials.footer')
        
