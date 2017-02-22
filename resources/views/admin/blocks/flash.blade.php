
@if(Session::has('flash_level'))
	<div id="flash_msg" style="position: fixed; float:right; margin-top: -6%;" class="alert alert-{{ Session::get('flash_level') }} col-md-3 col-md-offset-6">
		<b>{{ Session::get('flash_message')}}</b>
	</div>
@endif