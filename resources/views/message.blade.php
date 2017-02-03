@if(isset($errors) && $errors->has())
	<div class='col-md-12'>
		<div class="col-sm-12">
			<div class="alert alert-danger">
		        @foreach ($errors->all() as $error)
		            {{ $error }}<BR>       
		        @endforeach
		    </div>
		</div>
	</div>
@endif
@if(Session::has('error'))
<div class='col-md-12'>
	<div class="col-sm-12">
		<div class="alert alert-success">
			{{Session::get('error')}}
		</div>
	</div>
</div>
@endif
@if(Session::has('error_danger'))
<div class='col-md-12'>
	<div class="col-sm-12">
		<div class="alert alert-danger">
			{{Session::get('error_danger')}}
		</div>
	</div>
</div>
@endif