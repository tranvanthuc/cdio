@if(count($errors) > 0)
	<div  id="errors_msg" class="alert alert-danger col-md-3 col-md-offset-6" style="position: fixed; z-index: 1;">
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif