<div class="well hidden-xs col-md-12 justify-text-center col-sm-12 " id="profile" style="background-color:#fff; color:#000000; position:fixed; z-index:99; box-shadow: 1px 1px 1px 1px #888888; border-radius:0px; width:100%;">
  <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-1 mb-2 border-bottom container-fluid" style="background-color: #fff; color:#000000;">
<a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none col-md-6">

<span class="fs-4 link-dark">Hotel De SLSU</span>
</a>
<a class="col-md-9 flex-end"href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Sign Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
  </header>

</div>