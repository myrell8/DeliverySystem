@if($errors->any())
	<div class="alert alert-danger mt-2 mb-2">
		<ul>
			@foreach($errors->all() as $error) {{-- Loop to list all the errors the Laravel function returns --}}
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif