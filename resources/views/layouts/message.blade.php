@if(count($errors))
	<div class="alert alert-danger" role="alert" style="width: 100%;">
		@foreach($errors->all() as $error)
		
			<p>
				{!! $error !!}
			</p>
		
		@endforeach

	</div>
@endif

@if(session('error'))
	<div class="alert alert-danger" role="alert" style="width: 100%;">
		{{ session('error') }}
	</div>
@endif

@if(session('success'))
	<div class="alert alert-success" role="alert" style="width: 100%;margin-bottom: 10px;">
		{{ session('success') }}
	</div>
@endif

@if(session('info'))
	<div class="alert" role="alert" style="width: 100%;background-color: #888e91;color: #fff;border-color: #888e91;">
		{{ session('info') }}
	</div>
@endif