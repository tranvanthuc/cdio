@extends('admin.layout')

@section('title','Add User')


@section('content')
 	<form method="post">
	{{ csrf_field() }}
	<div class="col-md-offset-3 col-md-6">
		
		<div class="form-group" >
		  <label>Username</label>
		  <input type="text" class="form-control" placeholder="Enter username" name="username">
		</div>
		<div class="form-group">
		  <label>Password</label>
		  <input type="password" class="form-control" placeholder="Enter password" name="password">
		</div>
		<div class="form-group">
		  <label>Confirm Password</label>
		  <input type="password" class="form-control"  placeholder="Enter confirm password" name="confirmPassword">
		</div>
		<div class="form-group">
		  <label>Fullname</label>
		  <input type="text" class="form-control" placeholder="Enter fullname" name="name">
		</div>
		<div class="form-group">
		  <label>Email</label>
		  <input type="email" class="form-control" placeholder="Enter email" name="email">
		</div>

		<div class="form-group">
			<select class="form-control" name="sltLevel" >
				<option value="">Choose Level</option>
			 	
			 	@foreach($levels as $level)
			 		@if($level->id != 0 && $level->id > Auth::user()->level_id)
					<option value="{{ $level->id }}"> {{ $level->name }}</option>
					@endif
			 	@endforeach
			</select>
		</div>
		<div class="form-group">
	    	<input type="submit" class="btn btn-primary" value="Register">
		</div>
	</div>  
@endsection