@extends('app-admin')
@section('content')
	<h1>Article images</h1>
	@include('message')
	@foreach($articles as $article)
		<img style="width:100px;height:100px" src="/assets/admin/images/article-images/{{$article->article_image}}">
	@endforeach

	{!! Form::open(['action' => ['AdminController@postAddArticleImages',$articles[0]->id] ,'class' => 'form-horizontal','files' =>true  ]) !!}

  	<b>Article Image</b>
	{!! Form::file('article_image[]', array('multiple'=>true,'class' => 'form-control')) !!}
	<div class="modal-footer ">
		<button type="submit" class="btn btn-warning btn-lg edit_salon_admin" style="width: 100%;"  data-href="">
			  <span class="glyphicon glyphicon-ok-sign"></span>Add
		</button>
	</div>

	{!! Form::close() !!}
	@foreach($images as $image)
		<div style="float:left;width:200xp;height:100px;margin-left:12px;">
			<img style="width:100px;height:100px" src="/assets/admin/images/article-images/{{$image->article_image}}"><br>
			<button data-imageid="{{$image->id}}" data-articleid="{{$articles[0]->id}}" style="width:50%;float:left" class="btn btn-success edit_article_images"><i class="glyphicon glyphicon-ok"></i></button>

			<button style="width:50%"  data-target="#myModal" data-toggle="modal" data-href="{{action('AdminController@getDeleteArticleImage',$image->id)}}"  class="btn btn-danger delete_article"><i class="glyphicon glyphicon-trash"></i></button>
		</div>
	@endforeach


	<!-- delete Modal -->
	<div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog">
	    

	        <div class="modal-content">
		        <div class="modal-body">
		          <p>Are you sure delete this file?</p>
		        </div>
		        <div class="modal-footer">
		        	<a href="#" class="delete_article_yes">
		        		<button type="button" data-href="" class="btn btn-default">Yes</button>
		        	</a>
		          	<button type="button" class="btn btn-default" data-dismiss="modal">No</button>
		        </div>
	        </div>
	      
	    </div>
	</div>
  	<!--end Modal -->
@endsection