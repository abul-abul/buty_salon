<div style="width:40%;margin-left:20%">
	<h1>Add Article</h1>
	{!! Form::open(['action' => ['AdminController@postAddArticle'] ,'class' => 'form-horizontal','files' =>true  ]) !!}

		<b>Article title</b>
		{!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control']) !!}<br>

	  	<b>Article description</b>
		{!! Form::textarea('description', null, ['id'=>'article_description','placeholder' => 'Description', 'class' => 'form-control']) !!}<br>

	  	<b>Article Image</b>
		{!! Form::file('article_image', null, ['placeholder' => 'Pictures', 'class' => 'form-control']) !!}<br>

		<b>Link Video 1</b>
	    {!! Form::text('article_video1', null, ['placeholder' => 'Video 1', 'class' => 'form-control']) !!}<br>

	    <b>Link Video 2</b>
	    {!! Form::text('article_video2', null, ['placeholder' => 'Video 2', 'class' => 'form-control']) !!}<br>

		<div class="modal-footer ">
			<div class="col-md-3"></div>
	        <div class="col-md-5">
				<button type="submit" class="btn btn-warning btn-lg edit_salon_admin" style="width: 100%;"  data-href="">
					  <span class="glyphicon glyphicon-ok-sign"></span>Add
				</button>
			</div>
		</div>
	{!! Form::close() !!}
</div>

 	