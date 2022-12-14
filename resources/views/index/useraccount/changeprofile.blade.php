
   <div class="container border border-primary col-6">
      <div class="card-body justify-content-center ">
        <form action="{{url('account/updateprofile/'. Auth::id())}}" method="post" enctype="multipart/form-data" >
          @csrf
          @method("patch")
          <div class="text-center">
          <img src="{{asset('uploads/profile/'.$user->profile_image)}}" width="150px" height="150px" >
          </div>
          <input type="hidden" name = "id"  value="{{Auth::id()}}">
          <div class="row">
            
            <div class="col-md-12 mb-3">
              <label >User Profile: </label>
              <input type ="file" name = "profile_image" class = "form-control @error('profile_image') is-invalid @enderror" >
              @error('profile_image')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
            </div>
          </form>
            <div class="col-md-12 mb-3">
                <button type = "submit" class="btn btn-primary float-end">Update</button>
              </div>
              
  </div>
  </div>
   
    </div> 
        
      


