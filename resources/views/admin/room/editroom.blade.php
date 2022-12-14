@include('admin.sidebar')
<br>
<div id="layoutSidenav_content">
    <main> 
        <br>
<div class="container-fluid px-4">
    <div class="card">
      <div class="card-header">
        <h1>Rooms<a href ="{{ url ('admin/addroom')}}" class = "btn btn-primary btn sm text-white float-end mdi mdi-plus-circle-outline menu-icon"> Add Room</a></h1>
      </div>
      <div class="card-body shadow" style="overflow-x: auto;">
        <div class="callout" data-closable>
          @if(Session::has('success'))
        <div class="alert alert-success">
          <p><strong>{{ Session::get('success') }}</strong></p>  
        </div>
        
        </div>
        @endif
        <div class="card-body">
            <form action="{{url('admin/update-room/'.$room->slug)}}" method="post" enctype="multipart/form-data" >
              @csrf
              @method('PUT')
              <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Room Number: </label>
                    <input type ="text" name = "RoomNo" class = "form-control  @error('RoomNo') is-invalid @enderror"  value="{{$room->RoomNo}}" autofocus>
                    @error('RoomNo')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                @enderror
                  </div>
                <div class="col-md-6 mb-3">
                  <label>Room Profile: </label>
                  <input type ="file" name = "profile"  value="{{$room->profile}}"  class = "form-control @error('profile') is-invalid @enderror" autofocus>
                <img src="{{asset('uploads/category/'.$room->profile)}}" width="250px" height="150px" >
                @error('profile')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
                </div>

              <div class="col-md-6 mb-3">
                <label>Room Name: </label>
                <input type ="text" name = "name" value="{{$room->name}}"  class = "form-control @error('name') is-invalid @enderror" autofocus>
                @error('name')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

              <div class="col-md-6 mb-3">
                <label>Room Price: </label>
                <input type ="number" name = "price" value="{{$room->price}}" class = "form-control @error('price') is-invalid @enderror" autofocus>
                @error('price')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
             
              <div class="col-md-6 mb-3">
                <label>Capacity: </label>
                <input type ="number" name = "capacity" value="{{$room->capacity}}" class = "form-control @error('capacity') is-invalid @enderror" autofocus>
                @error('capacity')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

              <div class="col-md-6 mb-3">
                <label>Room Description</label>
                <input type ="description" name = "description" value="{{$room->description}}" class = "form-control @error('description') is-invalid @enderror" autofocus>
                @error('profile')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>

              <div class="col-md-12 mb-3">
                <button type = "submit" class="btn btn-primary float-end">Update</button>
              </div>

              </div>
            </form>
      </div>
      </div>
   </div>
</main>
  </div>
@include('partials.footer')
        

