@extends('app-admin')
@section('content')
@include('message')
@if(count($atricles)!= '')
	<h1>Article List</h1>
		<table class="table table-sm">
		  <thead>
		    <tr>
		      <th>Images</th>
		      <th>Title</th>
		      <th>edit/delete</th>
		    </tr>
		  </thead>
		  <tbody>
		  @foreach($atricles as $atricle)
		    <tr>
		      <td>
		      	<a href="{{action('AdminController@getArticleAlbum',$atricle->id)}}">
		      		<img style="width:100px;height:100px" src="/assets/admin/images/article-images/{{$atricle->article_image}}">
		      	</a>
		      </td>
		      <td>{{$atricle->title}}</td>
		      <td>
		      	<a href="{{action('AdminController@getEditArticle',$atricle->id)}}">
			        <button style="float:left" class="btn btn-info">
	                    <i class="glyphicon glyphicon-pencil"></i>
	                </button>
                </a>
		      	<button data-toggle="modal" class="btn btn-danger delete_article" data-href="{{action('AdminController@getDeleteArticle',$atricle->id)}}" data-target="#myModal">
		      		<i class="glyphicon glyphicon-trash"></i>
		      	</button>
		      </td>
		    </tr>	
		    @endforeach
		  </tbody>
		</table>

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
@else
	not article
@endif

@endsection