@extends('layout')

@section('title', "Register")

@section('content')
@include('admin.blocks.flash')
@include('admin.blocks.errors')
<form name="fRegis" method="post">
	{{ csrf_field() }}
	<div id="dBody" class="col-md-offset-4 col-md-4">
		<div class="form-group">
			<h1 align="center">Đăng ký</h1>
		</div>
		<div class="col-md-offset-1 col-md-10">
			<div class="form-group" >
			  <label>Tên Đăng Nhập:</label>
			  <input type="text" class="form-control" id="user" placeholder="Nhập tên đăng nhập" name="username" value="{{ old('username') }}">
			</div>
			<div class="form-group">
			  <label>Mật Khẩu:</label>
			  <input type="password" class="form-control" id="pass" placeholder="Nhập mật khẩu" name="password" >
			</div>
			<div class="form-group">
			  <label>Nhập lại mật khẩu:</label>
			  <input type="password" class="form-control" id="pass" placeholder="Nhập lại mật khẩu" name="confirmPassword">
			</div>
			<div class="form-group">
			  <label>Tên Đầy Đủ:</label>
			  <input type="text" class="form-control" id="FullName" placeholder="Nhập tên (họ và tên)" name="name" value="{{ old('name') }}">
			</div>
			<div class="form-group">
			  <label>Email:</label>
			  <input type="email" class="form-control" id="Email" placeholder="Nhập email " name="email" value="{{ old('email') }}">
			</div>

			{{-- <div class="form-group">
				<select class="form-control" name="sltSpec" >
					<option value="">Chuyên ngành</option>
				 	
				 	@foreach($listSpec as $spec)
						<option value="{{ $spec->id }}"> {{ $spec->name }}</option>
				 	@endforeach
				</select>
			</div> --}}
			<div class="form-group ">
		    	<input type="submit" class="btn btn-primary  col-md-5" value="Register">
		    	<a href="{{ route('getLogin') }}" type="button" class="btn btn-default col-md-offset-2 col-md-5" >Cancel</a>
			</div>
		</div>
	</div>  
</form>
@stop

