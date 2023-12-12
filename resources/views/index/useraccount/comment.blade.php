 
  <div class="mb-3">
    <!--<form action="{{ url('account/editcomment/')}}" method="post">
      @csrf
        <input type="hidden" value="{$exists->id}}" name="id">
        <input type="hidden" value="{$exists->user_id}}" name="user_id">
         <input type="hidden" value="{$exists->reservation_id}}" name="reserve_id" id="reserve_id">
      <textarea class="form-control" id="comment" name="comment" rows="5"  required>{$exists->description}}</textarea>
            <br>
      <div class="float-sm-right px-5">
        <button class="btn btn-primary" onclick="confirmation01(event)" >Edit Comment</button>
      </div><br>
    </form> -->
    @if(!empty($comment) && $comment->count())
    @foreach ($comment as $comments )
    <div class="card mb-3">
      <div class="card-body">
        <div class="d-flex flex-start">
          <img class="rounded-circle shadow-1-strong me-3"
               src="{{asset('/uploads/profile/'.$comments->profile_image)}}" alt="profile_image" 
          alt="avatar" width="40"
            height="40" />
          <div class="w-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h6 class="text-primary fw-bold mb-0 text-capitalize">
                {{$comments->lastname}}, {{$comments->firstname}}
                <span class="text-dark ms-2">{{$comments->Description}}</span>
              </h6>
              <p class="mb-0">{{$comments->updated_at}}</p>
            </div>
            <div class="d-flex justify-content-between align-items-center">
              <p class="small mb-0" style="color: #aaa;">
                <a  href="{{ url('account/deletecomment/'.$comments->slug)}}"  class="link-grey"  onclick="confirmation1as(event)" >Remove</a> •
                <a href="#!" class="button" class="link-grey" onclick="myFunctiona()">Edit</a> 
              </p>
              <div class="d-flex flex-row">
                @for($i=1; $i<=$comments->Score; $i++) 
                <span><i class="fa fa-star text-warning"></i></span>
                @endfor
               
              </div>
             
            </div>
            <div class=" mt-3" id="myDIVa" >
              <form action="{{ url('account/editcomment/'.$comments->slug)}}" method="post">
                @csrf
                @method('put')
               
                <textarea class="col-12 shadow" name="comment">{{$comments->Description}}  </textarea>
                <br><br>
                <button class="btn btn-end btn-info ">Save</button>
                </form>
               
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @else
    <p colspan="10">No record found.</p>
@endif

<div class="float-right"> {{ $comment->links() }}</div><br>
   </div>

   <script>
    function confirmation1as(ev) {
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

<script>
  function myFunction9(){
       
       
      document.getElementById("error").innerHTML = "Sorry. You are only allowed to comment after you checkout";
 }


function myFunctiona() {
var x = document.getElementById("myDIVa");
if (x.style.display == "none" || x.style.display == "") {
x.style.display = "block";
} else {
x.style.display = "none";
}
}
 </script>
<style>
#myDIVa {
display:none;

}
.textarea {
display:none;
width: 100%;
height: 150px;
box-sizing: border-box;
border: 2px solid #ccc;
border-radius: 4px;
background-color: #f8f8f8;
font-size: 16px;
resize: none;
}
 </style>

