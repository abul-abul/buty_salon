<div class="comment col-md-12 user_reviews last_review">
   <div class="block white block-shadow block-margin">
       <div class="block-inner" style="width: 80%;">
           <div class="row">
               <div class="picture-wrapper col-sm-3 col-md-2">
                   <div class="picture" style="width: 89px;">
                       @if($user[0]['user']['profile_picture'])
                           @if($user[0]['user']['facebook_id'] == null && $user[0]['user']['google_id']  == null)
                           <img src="/assets/user/user_images/{{$user[0]['user']['profile_picture']}}" class="img-circle" alt="#">
                           @else
                           <img src="{{$user[0]['user']['profile_picture']}}" style="height: 79px;" class="img-circle" alt="#">
                           @endif
                       @else
                           <img src="/assets/content/img/img.png" class="img-circle" alt="#">
                       @endif
                   </div><!-- /.picture -->
               </div><!-- /.picture-wrapper -->

               <div class="col-sm-9 col-md-10">
                   <div class="content-inner">
                       <div class="block-title clearfix">
                           <h3>{{$user[0]['user']['firstname']}}</h3>
                       </div><!-- /.block-title -->

                       <div class="meta">
                           <ul class="clearfix">
                               <li><i class="icon icon-normal-calendar-month"></i>{{$message['created_at']}}</li>
                           </ul>
                       </div><!-- /.meta -->

                       <div class="text">
                           <p>{{$message['message']}}</p>

                           <textarea rows="5"  class="edit_review_text">{{$message['message']}}</textarea>
                                                                          
                           @if(Auth::id() == $user[0]['user']['id'])
                               <i style="cursor:pointer"  class="glyphicon glyphicon-pencil edit_user_rew" ></i>
                               <i content="{{ csrf_token() }}" data-id="{{$message['id']}}" class="glyphicon glyphicon-ok update_user_review"></i>
                               <i  data-id="{{$message['id']}}" style="margin-left: 7px;cursor:pointer" class="glyphicon glyphicon-trash delete_review"></i>
                           @endif
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
</div>