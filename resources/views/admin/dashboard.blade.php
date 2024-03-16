@extends('layouts.app')

@section('title', ' Member List– Khit Thit')

@section('content')
<div class="layout-wrapper layout-content-navbar">
   	<div class="layout-container">
		@include('layouts.admin_sidebar', ['page'=>'member'])

		<div class="layout-page" style="background-color:#fff">
			@include('layouts.nav', ['nav'=>'Dashboard','page'=>'Page'])
		</div>
	</div>
</div>

@endsection('content')