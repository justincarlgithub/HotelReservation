
<div class="d-sm-block d-block d-lg-none">
  <br><br> 
</div>
<div class="d-md-block d-sm-block d-lg-none">
  <br><br>
</div>
<div class="pt-5 p-md-5 mb-4 text-white mx-auto" style="background-color:#060e4d; clip-path: ellipse(68% 76% at 50% 22%);">
    <div class="col-sm-12 px-0">
      <br><br>
      <br>
      <h1 class="display-4 fst-italic text-center">Title of a longer featured blog post</h1>
      <p class="lead my-3 text-center">Multiple lines of text that form the lede, informing new readers quickly and efficiently about what’s most interesting in this post’s contents.</p>
    </div>
  </div>

<section class="container-fluid pt-5">

@foreach ($comments as $comment )

<div class="row mb-2 px-5">
    <div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
         <br>
          <h3 class="mb-0 d-inline-block mb-2 text-primary">{{$comment->firstname}}</h3>
          <div class="mb-1 text-muted">{{$comment->created_at}}</div>
          <p class="card-text mb-auto">{{$comment->description}}</p>
        </div>
        <div class="col-auto d-none d-lg-block p-4">
          <img class="bd-placeholder-img" width="200" height="200" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false" src="{{asset('/uploads/profile/'.$comment->profile_image)}}">
        </div>
      </div>
    </div>
      
@endforeach



   

  </div>
</section>
<style>
  /* stylelint-disable selector-list-comma-newline-after */

.blog-header {
  line-height: 1;
  border-bottom: 1px solid #e5e5e5;
}

.blog-header-logo {
  font-family: "Playfair Display", Georgia, "Times New Roman", serif/*rtl:Amiri, Georgia, "Times New Roman", serif*/;
  font-size: 2.25rem;
}

.blog-header-logo:hover {
  text-decoration: none;
}

h1, h2, h3, h4, h5, h6 {
  font-family: "Playfair Display", Georgia, "Times New Roman", serif/*rtl:Amiri, Georgia, "Times New Roman", serif*/;
}

.display-4 {
  font-size: 2.5rem;
}
@media (min-width: 768px) {
  .display-4 {
    font-size: 3rem;
  }
}

.nav-scroller {
  position: relative;
  z-index: 2;
  height: 2.75rem;
  overflow-y: hidden;
}

.nav-scroller .nav {
  display: flex;
  flex-wrap: nowrap;
  padding-bottom: 1rem;
  margin-top: -1px;
  overflow-x: auto;
  text-align: center;
  white-space: nowrap;
  -webkit-overflow-scrolling: touch;
}

.nav-scroller .nav-link {
  padding-top: .75rem;
  padding-bottom: .75rem;
  font-size: .875rem;
}

.card-img-right {
  height: 100%;
  border-radius: 0 3px 3px 0;
}

.flex-auto {
  flex: 0 0 auto;
}

.h-250 { height: 250px; }
@media (min-width: 768px) {
  .h-md-250 { height: 250px; }
}

/* Pagination */
.blog-pagination {
  margin-bottom: 4rem;
}
.blog-pagination > .btn {
  border-radius: 2rem;
}

/*
 * Blog posts
 */
.blog-post {
  margin-bottom: 4rem;
}
.blog-post-title {
  margin-bottom: .25rem;
  font-size: 2.5rem;
}
.blog-post-meta {
  margin-bottom: 1.25rem;
  color: #727272;
}

/*
 * Footer
 */
.blog-footer {
  padding: 2.5rem 0;
  color: #727272;
  text-align: center;
  background-color: #f9f9f9;
  border-top: .05rem solid #e5e5e5;
}
.blog-footer p:last-child {
  margin-bottom: 0;
}

</style>