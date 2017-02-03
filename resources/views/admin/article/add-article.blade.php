@extends('app-admin')
@section('content')
	@include('message')
	@include('admin.form.add-article-form')
	
	{!! HTML::script(asset('assets/admin/plugins/js/tinymce/tinymce.min.js')) !!}
	<script type="text/javascript">
	    tinymce.init({
	        selector: "#article_description"
	    });
	</script>
	
@endsection


