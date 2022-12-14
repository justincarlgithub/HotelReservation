  <div class="row col-md-12 px-5 py-2">
            <div class="col-md-6 col-sm-6">
                <h5 class="text-capitalize fw-bold">
                    Firstname:<span class="fw-normal"> {{ Auth::user()->firstname }} </span><br> <br>
                    Lastname: <span class="fw-normal"> {{ Auth::user()->lastname }}</span>  <br> <br>
                    Email: <span class="fw-normal"><a class="__cf_email__">{{ Auth::user()->email }}</span></a> <br> <br>
                </h5>
            </div>
            <div class="col-md-6 col-sm-6">
              <div class="row">
              <div class="col-6">
              <span style="justify-content:between;"> @if(Auth::user()->profile_image)
                <img class="img-thumbnail" src="{{asset('/uploads/profile/'.Auth::user()->profile_image)}}" alt="profile_image" width="140px" height="140px">
                @endif <br></span></div>
                <br>
                <div class="col-6">
                <div class="float-sm-right">
                  <a class="btn mb-1" style="width:150px; background-color:#060e4d; color:#fff;"  href="{{ route('change-profile', ['id' => Auth::id()]) }}">{{ __('Update') }}</a>
                  <a class="btn mb-1" style="width:150px; background-color:#060e4d; color:#fff;" href="">Change Password</a>
                </div>
              </div>
            </div>
            </div>
        </div>
   