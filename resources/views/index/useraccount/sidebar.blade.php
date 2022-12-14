<nav class="navbar navbar-inverse visible-xs">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span> 
        </button>
        @if(Auth::user()->profile_image)
      <img class="image rounded-circle" src="{{asset('/storage/images/'.Auth::user()->profile_image)}}" alt="profile_image" width="50" height="50">
      @endif
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#">Home</a></li>
          <li class="active"><a href="#">Profile</a></li>
          <li><a href="#">Recent Activity</a></li>
          <li><a href="#">Booking History</a></li>
          <li><a href="#">View Comments</a></li>
          <li><a href="#">Add Comments</a></li>
        </ul>
      </div>
    </div>
  </nav>