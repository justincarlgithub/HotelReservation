
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
                           <span class="text-dark ms-2">{{$comment->Description}}</span>
                         </h6>
                         <p class="mb-0">{{$comment->created_at}}</p>
                       </div>
                       <div class="d-flex justify-content-between align-items-center">
                         <p class="small mb-0" style="color: #aaa;">
                           <a href="#!" class="link-grey">Remove</a> •
                           <a href="#!" class="link-grey">Reply</a> 
                         </p>
                           <div class="d-flex flex-row">
                             @for($i=1; $i<=$comment->Score; $i++) 
                             <span><i class="fa fa-star text-warning"></i></span>
                             @endfor
                            
                         </div>
                       </div>
                     </div>
                   </div>
                 </div>
               </div>
               @endforeach
             </div>