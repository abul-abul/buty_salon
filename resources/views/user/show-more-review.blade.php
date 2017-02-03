@foreach($reviews as $review)

<div class="comment col-md-12 user_reviews"  data-id="{{$review['review']['id']}}" >
    <div class="block white block-shadow block-margin">
        <div class="block-inner" style="width: 80%;">
            <div class="row">
                <div class="picture-wrapper col-sm-3 col-md-2">
                    <div class="picture" style="width: 89px;">
                        @if($review['user']['profile_picture'])
                            @if($review['user']['facebook_id'] == null && $review['user']['google_id']  == null)
                            <img src="/assets/user/user_images/{{$review['user']['profile_picture']}}" class="img-circle" alt="#">
                            @else
                            <img src="{{$review['user']['profile_picture']}}" style="height: 79px;" class="img-circle" alt="#">
                            @endif
                        @else
                            <img src="/assets/content/img/img.png" class="img-circle" alt="#">
                        @endif
                    </div><!-- /.picture -->
                </div><!-- /.picture-wrapper -->


                <div class="col-sm-9 col-md-10">
                    <div class="content-inner">
                        <div class="block-title clearfix">
                            <h3>{{$review['user']['firstname']}}</h3>
                        </div><!-- /.block-title -->

                        <div class="meta">
                            <ul class="clearfix">
                                <li><i class="icon icon-normal-calendar-month"></i>{{$review['review']['created_at']}}</li>
                            </ul>
                        </div><!-- /.meta -->

                        <div class="text">
                            <p>{{$review['review']['message']}}</p>
                            <textarea rows="5"  class="edit_review_text">{{$review['review']['message']}}</textarea>    
                            @if(Auth::id() == $review['user']->id)
                                <i style="cursor:pointer"  class="glyphicon glyphicon-pencil edit_user_rew" ></i>
                                <i content="{{ csrf_token() }}" data-id="{{$review['review']->id}}" class="glyphicon glyphicon-ok update_user_review"></i>
                                <i  data-id="{{$review['review']->id}}" style="margin-left: 7px;cursor:pointer" class="glyphicon glyphicon-trash delete_review"></i>
                            @endif
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   
@endforeach



    @if($count < 3)
        
    @else
        <div class="row">
            <center>
                <p class="loading_review" style="display:none;font-size:16px;color:red;"><i class="fa fa-spinner fa-spin"></i>{{trans('common.loading')}}</p>
                <a class="show_more_review1" style="font-size:16px;cursor:pointer">{{trans('common.show_more')}}</a>
            </center>
        </div>
    @endif  