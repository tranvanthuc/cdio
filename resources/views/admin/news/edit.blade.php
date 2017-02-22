@extends('admin.layout')

@section('title','Edit News')

@section('content')

 	<form method="post" enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="col-md-offset-3 col-md-6">
		<div class="form-group" >
		  <label>Title</label>
		  <input type="text" class="form-control" placeholder="Enter title news" name="title" value="{{ $news->title }}">
		</div>
		
		<div class="form-group">
			<label >Choose Major</label>
			<select class="form-control" name="sltMajors" >
				<option value="">Choose Major</option>
			 	
			 	@foreach($listMajors as $major)
					<option value="{{ $major->id }}" {{ ($news->major_id == $major->id) ? "selected" : ""}}> {{ $major->name }}</option>
			 	@endforeach
			</select>
		</div>

		<div class="form-group">
		  <label>Subject</label>
		  <input type="text" class="form-control" placeholder="Enter Subject" name="subject" value="{{ $news->subject }}">
		</div>
		<div class="form-group">
		  <label >Description</label>
		  <textarea class="form-control" name="desc" cols="30" rows="10">{!! $news->desc!!}</textarea>
		  <script type="text/javascript">ckfinder("desc"); </script>
		</div>
		<div class="form-group">
		  <label>Price</label>
		  <input type="text" class="form-control" placeholder="Enter Price" name="price" value="{{ $news->price }}">
		</div>
		<div class="form-group">
			<img class="img-responsive img-thumbnail" src="{{ asset('uploads/news'. $news->id .'/'.$news->image) }}" alt="{{ $news->image }}">
		</div>

		
		<div class="form-group">
	    	<input type="submit" class="btn btn-primary" value="Edit news">
	    	<a href="{{ route('getListNews')}}" class="btn btn-default col-md-offset-1">Cancel</a>

		</div>
		
	</div>  
@endsection