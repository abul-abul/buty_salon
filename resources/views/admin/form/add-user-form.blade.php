<div style="width:40%;margin-left:20%">
	<h1>Add user</h1>

	{!! Form::open(['action' => ['AdminController@postAddUser'] ,'class' => 'form-horizontal','files' =>true  ]) !!}

	  	<b>Firstname</b>
		{!! Form::text('firstname', null, ['placeholder' => 'First Name', 'class' => 'form-control']) !!}<br>

		<b>Last Name</b>
		{!! Form::text('lastname', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) !!}<br>
		
		<b>Username</b>
	  	{!! Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}<br>

	  	<b>Pictures</b>
	  	{!! Form::file('profile_picture', null, ['placeholder' => 'Pictures', 'class' => 'form-control']) !!}<br>

		<b>Phone Number</b>
		{!! Form::text('phone', null, ['placeholder' => 'Phone Number', 'class' => 'form-control']) !!}<br>

		<b>Email</b>
		{!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}<br>

		<b>Address</b>
		{!! Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) !!}<br>

		<b>Password</b>
		{!! Form::password('password',['placeholder' => 'Password', 'class' => 'form-control']) !!}<br>

	  	<b>Password Confirmation</b>
	  	{!! Form::password('password_confirmation',['placeholder' => 'Confirm Password', 'class' => 'form-control']) !!}<br>
		
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