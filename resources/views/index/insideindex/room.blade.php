
<div class="d-sm-block d-block d-lg-none">
  <br><br> <br><br>
</div>
<div class="d-md-block d-sm-block d-lg-none">
  <br><br>
</div>
<section class="py-5 text-center container-fluid" style="background-color: #060e4d; clip-path: ellipse(68% 76% at 50% 22%);">
  <div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
      <br><br>
      <h1 style="color: #fff;">Album example</h1>
      <p class="lead" style="color: #fff;">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
      <p>
        <a href="#" class="btn btn-primary my-2">Main call to action</a>
        <a href="#" class="btn btn-secondary my-2">Secondary action</a>
      </p>
    </div>
  </div>
</section>
<section>
  <div class="album py-5 bg-light">
    <div class="container" id="rooms">
      <h1 class="display-4 fw-bold text-center"> Rooms</h1>
      <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3">
      @foreach ($room as $item)
        <div class="col">
          <div class="card shadow" style="border-radius: 25px;"> 
            <a href="{{url ('index/roomdisplay/'.$item->slug) }}" ><img src="{{asset('uploads/category/'.$item->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top pic" style="border-radius: 25px 25px 0px 0px;" width="80" height="350"></a>

            <div class="card-body">
              <h5 class="fw-bold">{{$item->name}}</h5>
              <p class="card-text">{{$item->description}}</p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                  <a href = "{{url ('index/roomdisplay/'.$item->slug) }}" class="btn btn-sm btn-outline-secondary">View</a>
                </div>
                <small class="text-muted">&#8369;{{number_format($item->price, 2)}}</small>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
      
    </div>
  </div>
</section>
  
   <section>
    <div class="album py-5 bg-light">
      <div class="container" id="rooms">
        <h1 class="display-4 fw-bold text-center"> Rooms</h1>
        <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3">
        @foreach ($room as $item)
          <div class="col">
            <div class="card shadow" style="border-radius: 25px;"> 
              <a href="{{url ('index/roomdisplay/'.$item->slug) }}" ><img src="{{asset('uploads/category/'.$item->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top pic" style="border-radius: 25px 25px 0px 0px;" width="80" height="350"></a>
  
              <div class="card-body">
                <h5 class="fw-bold">{{$item->name}}</h5>
                <p class="card-text">{{$item->description}}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href = "{{url ('index/roomdisplay/'.$item->slug) }}" class="btn btn-sm btn-outline-secondary">View</a>
                  </div>
                  <small class="text-muted">&#8369;{{number_format($item->price, 2)}}</small>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        
      </div>
    </div>
   </section>
 
    
<style>
  img:hover {
    -webkit-filter: brightness(70%);
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>  
<script>
  function dis()
  {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", "{{url ('fetch-room') }}", false );
    xmlhttp.send(null);
    document.getElementById("rooms").innerHTML = xmlhttp.responseText;
  }
  dis();
  setInterval(function(){
    dis();
  }, 2000);


 
</script>