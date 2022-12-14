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
 </style>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 <script>
  $(document).on('keyup', function(e){
   e.preventDefault();
   let search_string = $('#search').val();
      })
 </script>