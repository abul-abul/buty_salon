<div style="width:40%;margin-left:20%">
	<h1>Add Salon worker</h1>
	{!! Form::open(['action' => ['SalonAdminController@postAddSalonWorker'] ,'class' => 'form-horizontal','files' =>true  ]) !!}
	<b>Firstname</b>
	{!! Form::text('firstname', null, ['placeholder' => 'First Name', 'class' => 'form-control']) !!}<br>

	<b>Last Name</b>
	{!! Form::text('lastname', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) !!}<br>

	@if($prof != '')
		<b>Category</b>
	{!! Form::select('category_id', $prof, null, array('class' => 'form-control editPage')) !!}<br>
	@endif

	<b>Pictures</b>
	{!! Form::file('profile_picture', null, ['placeholder' => 'Pictures', 'class' => 'form-control']) !!}<br>

	<b>Profession</b>
	{!! Form::text('profession', null, ['placeholder' => 'Profession', 'class' => 'form-control']) !!}<br>

	<b>Phone Number</b>
	{!! Form::text('phone', null, ['placeholder' => 'Phone Number', 'class' => 'form-control']) !!}<br>

	<b>Email</b>
	{!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}<br>

	<div class="modal-footer ">
		<div class="col-sm-3"></div>
		<div class="col-sm-5">
			<button type="submit" class="btn btn-warning btn-lg edit_salon_admin" style="width: 100%;"  data-href="">
				  <span class="glyphicon glyphicon-ok-sign"></span>Add
			</button>
		</div>
	</div>
	{!! Form::close() !!} 
</div>	