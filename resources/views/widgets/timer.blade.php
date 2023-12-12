<section>
    <div class="album py-5" id="room">
          <div class="container">
          <h1 class="display-4 fw-bold text-center">Available Room For Today</h1>
          <div class="row row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-3 g-3" >
            @if(!empty($roomreservation) && $roomreservation->count())
    @foreach($room as $key => $value)
    <div class="col">
      <div class="card shadow-sm" style="border-radius: 25px;"> 
       <a href="{{url ('index/roomdisplay/'.$value->slug) }}" ><img src="{{asset('uploads/category/'.$value->profile)}}" alt="HTML tutorial" class="bd-placeholder-img card-img-top" style="border-radius: 25px 25px 0px 0px;" width="80" height="350"></a>

        <div class="card-body">
          <h5 class="fw-bold">{{$value->name}}</h5>
          <p class="card-text"> {{$value->description}}</p>
          <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
              <a type="button" class="btn btn-sm btn-outline-secondary" href="{{url ('index/roomdisplay/'.$value->slug) }}">View</a>
              
            </div>
            <small class="text-muted">&#8369;{{$value->price}}</small>
          </div>
        </div>
      </div>
    </div>
        @endforeach
            </div>
          </div>
         
        </div>
        @else
        <center><h4>No rooms available today</h4></center>
                
            @endif
    </section>