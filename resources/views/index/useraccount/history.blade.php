<div class="row px-5 py-2">
 
  <div class="col-6 col-sm-6">
      <h5 class="text-capitalize fw-bold"> 
        @if(!empty($booking) && $booking->count())
  @foreach($booking as $key => $value)

        <b>{{++$i}}</b> <br> <br>
        
          Booked Room : <span class="fw-normal"> {{ $value->room_id}}</span><br> <br>
          Check in :<span class="fw-normal"> {{ $value->check_in}}</span><br> <br>
          Check out : <span class="fw-normal"> {{ $value->check_out}}</span>
         
            
      </h5>
  </div>
  <div class="col-6 col-sm-6">
      <h5 class="text-capitalize fw-bold">
        <br><br>
        @if($value->status ==1) 
        Status:<span class="fw-normal"> Checked in </span><br> <br>
        @elseif ($value->status ==2)
        Status: <span class="fw-normal">Checked out</span> <br> <br>
        @else
        Status: <span class="fw-normal">Checked in</span>
        @endif
         
          Total Paid: <span class="fw-normal">&#8369; {{number_format($value->total)}}</span> <br> <br>
          Payment Status: 
          @if($value->status ==1) 
          <a class="btn btn-danger">UNPAID</a>
          @elseif ($value->status ==2)
          <a class="btn btn-success"> PAID </a>
          @else
          <a class="btn btn-danger">UNPAID</a>
          @endif
        </h5><br>
      </div> 

         @php
           $specificCommentCounter = 0
         @endphp  
              @foreach ($countComment as $countRoomreservationId)
              
                @if ($countRoomreservationId->id == $value->id)
                
                @php
                $specificCommentCounter +=1
              @endphp 


                 
                  <div class="card mb-3">
                    <div class="card-body">
                      <div class="d-flex flex-start">
                        <img class="rounded-circle shadow-1-strong me-3"
                             src="{{asset('/uploads/profile/'.$countRoomreservationId->profile_image)}}" alt="profile_image" 
                        alt="avatar" width="40"
                          height="40" />
                        <div class="w-100">
                          <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="text-primary fw-bold mb-0 text-capitalize">
                              {{$countRoomreservationId->lastname}}, {{$countRoomreservationId->firstname}}
                              <span class="text-dark ms-2">{{$countRoomreservationId->Description}}</span>
                            </h6>
                            <p class="mb-0">{{$countRoomreservationId->updated_at}}</p>
                          </div>
                          <div class="d-flex justify-content-between align-items-center">
                            <p class="small mb-0" style="color: #aaa;">
                              <a  href="{{ url('account/deletecomment/'.$countRoomreservationId->slug)}}"  class="link-grey"  onclick="confirmation1as(event)" >Remove</a> •
                              <a href="#!" class="button" class="link-grey" onclick="myFunctiona()">Edit</a> 
                            </p>
                            <div class="d-flex flex-row">
                              @for($i=1; $i<=$countRoomreservationId->Score; $i++) 
                              <span><i class="fa fa-star text-warning"></i></span>
                              @endfor
                             
                            </div>
                           
                          </div>
                          <div class=" mt-3" id="myDIVa" >
                            <form action="{{ url('account/editcomment/'.$countRoomreservationId->slug)}}" method="post">
                              @csrf
                              @method('put')
                             
                              <textarea class="col-12 shadow" name="comment">{{$countRoomreservationId->comment}}  </textarea>
                              <br><br>
                              <button class="btn btn-end btn-info ">Save</button>
                              </form>
                             
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              
              @endforeach
              @if ($specificCommentCounter == 0)
              
              <div class="row px-5 py-2">
                <hr class="border-2 border-top">
                
                          <div class="mb-3">
                            <form action="{{url('account/addcomment')}}" method="post">
                              @csrf
                              @method('post')
                              <label for="comment" class="form-label" >Leave a Comment</label>
                             
                              <input type="hidden" value="{{$value->id}}" name="reserve_id" id="reserve_id">
                              <textarea class="form-control" id="description" name="description" rows="5" required ></textarea>
                
                              <br>
                              <div class="content-justify-end">
                                  <h6>Rate us: </h6>
                                   <div class="col-sm-6">
                                    <div class="rate" required>
                                       <input type="radio" id="star5" class="rate" name="rating" value="5"/>
                                       <label for="star5" title="text">5 stars</label>
                                       <input type="radio" checked id="star4" class="rate" name="rating" value="4"/>
                                       <label for="star4" title="text">4 stars</label>
                                       <input type="radio" id="star3" class="rate" name="rating" value="3"/>
                                       <label for="star3" title="text">3 stars</label>
                                       <input type="radio" id="star2" class="rate" name="rating" value="2">
                                       <label for="star2" title="text">2 stars</label>
                                       <input type="radio" id="star1" class="rate" name="rating" value="1"/>
                                       <label for="star1" title="text">1 star</label>
                                    </div>
                                 </div>
                              </div>
                              
                              <div class="float-som-right px-5">
                                <input type="submit" style="width:100%; background-color:#060e4d; color:#fff;"class="btn" value="Submit Comment" id="comment" >
                                  <p id="error" style="color: red"></p>
                              </div>
                            </form>
                    </div>
                </div>
                
              
              @endif
                
   
  @endforeach

    @else
                <p colspan="10">No record found.</p>
    @endif
  
    <div class="float-right"> {{ $booking->links() }}</div><br>
</div>


<script>
  function myFunction9(){
       
       
      document.getElementById("error").innerHTML = "Sorry. You are only allowed to comment after you checkout";
 }


function myFunction() {
var x = document.getElementById("myDIV");
if (x.style.display == "none" || x.style.display == "") {
x.style.display = "block";
} else {
x.style.display = "none";
}
}
 </script>
<style>
#myDIV {
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
.rate {
         float: left;
         height: 46px;
         padding: 0 10px;
         }
         .rate:not(:checked) > input {
         position:absolute;
         display: none;
         }
         .rate:not(:checked) > label {
         float:right;
         width:1em;
         overflow:hidden;
         white-space:nowrap;
         cursor:pointer;
         font-size:30px;
         color:#ccc;
         }
         .rate:not(:checked) > label:before {
         content: '★ ';
         }
         .rate > input:checked ~ label {
         color: #ffc700;
         }
         .rate:not(:checked) > label:hover,
         .rate:not(:checked) > label:hover ~ label {
         color: #deb217;
         }
         .rate > input:checked + label:hover,
         .rate > input:checked + label:hover ~ label,
         .rate > input:checked ~ label:hover,
         .rate > input:checked ~ label:hover ~ label,
         .rate > label:hover ~ input:checked ~ label {
         color: #c59b08;
         }
         .rating-container .form-control:hover, .rating-container .form-control:focus{
         background: #fff;
         border: 1px solid #ced4da;
         }
         .rating-container textarea:focus, .rating-container input:focus {
         color: #000;
         }
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script>
  $(document).on('keyup', function(e){
   e.preventDefault();
   let search_string = $('#search').val();
      })
 </script>