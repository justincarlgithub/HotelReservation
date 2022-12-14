@include('admin.sidebar')
<br>
<div id="layoutSidenav_content">
    <main> 
        <br>
<div class="container-fluid px-4">
    <div class="card">
      <div class="card-header">
        <h1>Rooms<a href ="{{ url ('admin/view-room')}}" class = "btn btn-danger btn sm text-white float-end mdi mdi-plus-circle-outline menu-icon">Back</a></a></h1>
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
        
            <form action="{{url ('admin/add-room')}}" method="post" enctype="multipart/form-data" >
              @csrf
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label>Room Number: </label>
                  <input type ="text" name = "RoomNo" class = "form-control  @error('RoomNo') is-invalid @enderror"  value="{{ old('RoomNo') }}" autofocus>
                  @error('RoomNo')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
                </div>
                <div class="col-md-6 mb-3">
                  <label>Room Profile: </label>
                  <input type ="file" name = "profile" class = "form-control @error('profile') is-invalid @enderror"value="{{ old('profile') }}" autofocus>
                  @error('profile')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
                </div>

              <div class="col-md-6 mb-3">
                <label>Room Name: </label>
                <input type ="text" name = "name" class = "form-control  @error('name') is-invalid @enderror"  value="{{ old('name') }}" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
            @enderror
              </div>

              <div class="col-md-6 mb-3">
                <label>Room Price: </label>
                <input type ="number" name = "price" class = "form-control  @error('price') is-invalid @enderror"  value="{{ old('price') }}" autofocus>
                @error('price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
               @enderror
              </div>
             
              <div class="col-md-6 mb-3">
                <label>Capacity: </label>
                <input type ="number" name = "capacity" class = "form-control  @error('capacity') is-invalid @enderror" value="{{ old('capacity') }}" autofocus>
                @error('capacity')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
               @enderror
              </div>

              <div class="col-md-6 mb-3">
                <label>Room Description</label>
                <input type ="description" name = "description" class = "form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
                @error('description')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
               @enderror
              </div>

              <div class="col-md-12 mb-3">
                <button type = "submit" class="btn btn-primary float-end mdi mdi-upload menu-icon">Save</button>
              </div>

              </div>
            </form>
      </div>
      </div>
   </div>
</main>
  </div>
@include('partials.footer')
        

