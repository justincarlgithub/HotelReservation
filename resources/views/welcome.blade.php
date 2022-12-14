
@include('partials.userheader')

@include('sweetalert::alert')

<section>
  <br><br><br><br>
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1" style="border-radius: 50%;width: 15px;height: 15px; background-color:#060e4d;"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2" style="border-radius: 50%;width: 15px;height: 15px; background-color:#060e4d;"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3" style="border-radius: 50%;width: 15px;height: 15px;background-color:#060e4d;"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="storage\images\IMG_20220805_091536.png" class="d-block w-100 img-fluid" alt="..." style="height: 650px">
          </div>
          <div class="carousel-item">
            <img src="storage\images\Coffee_Prose_1.png" class="d-block w-100 img-fluid" alt="..." style="height: 650px">
          </div>
          <div class="carousel-item">
            <img src="storage\images\c.jpg" class="d-block w-100" alt="..." style="height: 650px">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon p-4" aria-hidden="true" style="color: #060e4d;"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon p-4" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

</section>

<section id="about">
    <div class="p-5 mb-4" style="background-color: #060e4d; color:#fff;">
          <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold">About SLSU Hotels</h1>


            <p class="col-md-8 fs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi voluptates fugit maiores dignissimos quia dolores error nam vero soluta ratione ullam a eius, dolor earum, magni corporis quos unde repellendus.</p>
            <a class="btn btn-primary btn-lg" type="button" style="background-color: white; color:#060e4d;" href="{{url ('index/about') }}">See More</a>
          </div>
        </div>
        
    </section>
    
    <section>
       @asyncWidget('timer')
        </section>
        

        <section id="testimonials"style="background-color: #060e4d; color:#fff; padding: bottom 20px;" class="py-5 px-5">
            <h1 class="display-4 fw-bold text-center" style="padding-top: 20px;">Testimonials</h1>
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" >
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="uploads\profile\default.png" class="w-22 p-3 position-relative top-0 start-50 translate-middle-x" alt="..." style="width: 150px;">
                  <h1 class="text-center">Qwerty</h1>
                  <p class="text-center fs-5" >&#34;<span class="text-center">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</span>&#34;</p>
                </div>
                <div class="carousel-item">
                  <img src="uploads\profile\default.png" class="w-22 p-3 position-relative top-0 start-50 translate-middle-x" alt="..."style="width: 150px;">
                  <h1 class="text-center">Qwerty</h1>
                  <p class="text-center fs-5">&#34;<span class="text-center">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</span>&#34;<</p>
                </div>
                <div class="carousel-item">
                  <img src="uploads\profile\default.png" class="w-22 p-3 position-relative top-0 start-50 translate-middle-x" alt="..."style="width: 150px;">
                  <h1 class="text-center">Qwerty</h1>
                  <p class="text-center fs-5">&#34;<span class="text-center">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer. </span>&#34;<</p>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            
            <button class="btn btn-primary btn-lg position-relative bottom-0 start-50 translate-middle-x" type="button" style="background-color: #fff; color:#060e4d;">See More</button>
            </section>


            <section class="py-5">
                <div class="container">
              <div class="col-md-12 col-lg-12 justify-content-center">
                <h1 class="display-4 fw-bold text-center" style="padding-top: 20px;">Contact Us</h1>
                      <form class="needs-validation" novalidate>
                        <div class="row g-3">
                          <div class="col-sm-6">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                              qwerty
                            </div>
                          </div>
              
                          <div class="col-sm-6">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                              qwerty
                            </div>
                          </div>
              
                          <div class="col-12">
                            <label for="username" class="form-label">Email Us</label>
                            <div class="input-group has-validation">
                              <span class="input-group-text">@</span>
                              <input type="text" class="form-control" id="username" placeholder="" required>
                            <div class="invalid-feedback">
                              qwerty
                              </div>
                            </div>
                          </div>
              
                          <div class="col-12">
                            <label for="email" class="form-label">Call Us<span class="text-muted"></span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com">
                            <div class="invalid-feedback">
                              qwerty
                              
                            </div>
                          </div>
                        </div>
                        
              </section>
            <style>
             #about{
              background-color: #060e4d;
              clip-path: polygon(12% 100%, 100% 56%, 100% 0, 0 0, 0 81%);
             }
             #testimonials{
              clip-path: ellipse(68% 76% at 50% 22%);
             }
             #room img:hover {
    -webkit-filter: brightness(70%);
    -webkit-transition: all 1s ease;
    -moz-transition: all 1s ease;
    -o-transition: all 1s ease;
    -ms-transition: all 1s ease;
    transition: all 1s ease;
}
            </style>
              @include('partials.top')

