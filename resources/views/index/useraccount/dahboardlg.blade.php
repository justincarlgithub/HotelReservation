<div class="col-sm-3 sidenav hidden-xs " style="height:100%; ">
    <br><br><br><br><br><br>
    <center>  
      @if(Auth::user()->profile_image)
      <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->profile_image)}}" alt="profile_image" style="width=150;height=150;" >
      @endif
    <br><br><h3 class="text-capitalize"><b>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} </b></h3>
    <a class=" __cf_email__">{{ Auth::user()->email }} </a>
    </center>
    
    <br>
    <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#profile">Profile</a></li>
        <li><a href="#activity">Recent Activity</a></li>
        <li><a href="#history">Booking History</a></li>
        <li><a href="#history">View Comments</a></li>
        <li><a href="#history">Add Comment</a></li>
    </ul><br>
  </div>