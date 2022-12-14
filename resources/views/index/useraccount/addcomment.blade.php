<div class="row px-5 py-2">
<hr class="border-2 border-top">

          <div class="mb-3">
            <form action="{{url('account/addcomment')}}" method="post">
              @csrf
              <label for="comment" class="form-label" >Leave a Comment</label>
             
              <input type="hidden" value=" " name="reserve_id" id="reserve_id">
              <textarea class="form-control" id="description" name="description" rows="5" required ></textarea>

              <br>
              <div class="float-som-right px-5">
                <input type="submit" style="width:100%; background-color:#060e4d; color:#fff;"class="btn" value="Submit Comment" id="comment" >
                  <p id="error" style="color: red"></p>
              </div>
            </form>
    </div>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
 function myFunction5(){
      jQuery.fn.extend({
                    disable: function(state) {
                        return this.each(function() {
                            this.disabled = state;
                        });
                    }
                });
                // Enabled with:
                $('input[type="submit"], submit').disable(true);
     document.getElementById("error").innerHTML = "**Sorry. You are only allowed to comment after you checkout**";
     $.ajax({
      url: "{{url ('commentcheck') }}",
      method:"POST",
      data:{check_in:check_in,room_id:room_id, _token:_token},
      success:function(result)
      {
          if(result == 'unique')
          {
            $('#error_checkin').html('<label></label>');
            $('#check_in').removeClass('has-error');
            $('#check_in').attr('style', "border-radius: 5px; border:#cacbcc 1px solid;"); 
            $('#su').attr('disabled', 'disabled');
            
          }
          else
          {
            $('#error_checkin').html('<label class="text-danger"><b>Date unavailable &nbsp; &#9888;</b></label>');
            $('#check_in').addClass('has-error');
            $('#check_in').attr('style', "border-radius: 8px; border:#FF0000 5px solid;"); 
            $('#su').attr('disabled', 'disabled');
          }
      }
     })

}
</script>