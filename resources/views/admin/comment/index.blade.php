
<style>
    .link-grey { color: #aaa; } .link-grey:hover { color: #00913b; }
</style>
@include('admin.sidebar')
<div id="layoutSidenav_content">
    <main>
        <br>
<div class="container-fluid px-4">
    <div class="card">
      <div class="card-header">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h1 class="text-dark mb-0">Comments</h1>
          <div class="card">
            <div class="card-body p-2 d-flex align-items-center">
              <h6 class="text-primary fw-bold small mb-0 me-1">Comments     "ON"</h6>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                <label class="form-check-label" for="flexSwitchCheckChecked"></label>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-body shadow" style="overflow-x: auto;">
        <section style="background-color: #f7f6f6;">
          
                
                @foreach ($comments as $comment )
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="d-flex flex-start">
                      <img class="rounded-circle shadow-1-strong me-3"
                           src="{{asset('/storage/images/'.$comment->profile_image)}}" alt="profile_image" 
                      alt="avatar" width="40"
                        height="40" />
                      <div class="w-100">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                          <h6 class="text-primary fw-bold mb-0 text-capitalize">
                            {{$comment->lastname}}, {{$comment->firstname}}
                            <span class="text-dark ms-2">{{$comment->description}}</span>
                          </h6>
                          <p class="mb-0">{{$comment->created_at}}</p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                          <p class="small mb-0" style="color: #aaa;">
                            <a href="#!" class="link-grey">Remove</a> •
                            <a href="#!" class="link-grey">Reply</a> 
                          </p>
                          <div class="d-flex flex-row">
                            <i class="fas fa-star text-warning me-2"></i>
                            <i class="far fa-check-circle" style="color: #aaa;"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
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
@include('partials.footer')
        
