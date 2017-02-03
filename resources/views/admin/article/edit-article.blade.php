@extends('app-admin')
@section('content')
<div style="width:40%;margin-left:20%">
	<h1>Edit article</h1>
	{!! Form::model($article,['action' => ['AdminController@postEditArticle', $article->id] ,'class' => 'form-horizontal','id'=>'edit_form','files' => 'true' ]) !!}
     	 	<b>Title</b>
     	 	{!! Form::text('title', null, ['placeholder' => 'title','class' => 'form-control','id'=>'title']) !!}<br>
			<b>Description</b>
     	 	{!! Form::textarea('description', null, ['placeholder' => 'Description','id'=>'article_description','class' => 'form-control']) !!}<br>
			<b>Article Image</b>
			{!! Form::file('article_image', null, ['class' => 'form-control']) !!}<br>
			<b>Link Video 1</b>
		    {!! Form::text('article_video1', null, ['placeholder' => 'Video 1', 'class' => 'form-control']) !!}<br>
		    @if($article['article_video1'])
			<div>
				<iframe width="300" height="200" src="{{$article['article_video1']}}" frameborder="0" allowfullscreen></iframe><br>
			</div>
			@endif
		    <b>Link Video 2</b>
		    {!! Form::text('article_video2', null, ['placeholder' => 'Video 2', 'class' => 'form-control']) !!}<br>
		    @if($article['article_video2'])
			 <div>
				<iframe width="300" height="200" src="{{$article['article_video2']}}" frameborder="0" allowfullscreen></iframe><br>
			</div>
			@endif
     	 	<div class="modal-footer">
     	 		<div class="col-md-3"></div>
	        	<div class="col-md-5">
		      		<button type="submit" class="btn btn-warning btn-lg edit_salon" style="width: 100%;"  data-href="">
						<span class="glyphicon glyphicon-ok-sign"></span>Update
			        </button>
			    </div>
		    </div>
	{!! Form::close() !!}
</div>
	{!! HTML::script(asset('assets/admin/plugins/js/tinymce/tinymce.min.js')) !!}
	<script type="text/javascript">
	    tinymce.init({
	        selector: "#article_description"
	    });
	</script>
@endsection