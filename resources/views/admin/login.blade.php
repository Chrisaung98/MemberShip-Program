@extends('layouts.app')

@section('title', 'Login – Khit Thit')

<link rel="stylesheet" href="{{ url('/css/page-auth.css') }}" />
@section('content')
<body style="background-color: #23225C">
<div class="container-xxl">
	<div class="authentication-wrapper authentication-basic container-p-y">
		<div class="authentication-inner">
			<!-- Register -->
			<div class="card">
				<div class="card-body">
					<!-- Logo -->
					<div class="app-brand justify-content-center">
						<a href="" class="app-brand-link gap-2">
							<img src="{{ url('/images/kt-logo.png') }}" class="img-fluid" style="width: 60%;margin: 0 57px;">
						</a>
					</div>
					
						<h1 class="welcome" style="text-align: center;color: #23225C; font-size: 30px; font-weight: bold;">Welcome</h1>
						<h5 class="login" style="text-align: center; color: #808080; font-size: 10px;">Login with Employee ID</h5>
					
					@include('layouts.message')
					<form id="formAuthentication" class="mb-3" action="{{ url('/authlogin') }}" method="POST">
						{{ csrf_field() }}
						<div class="mb-3">
							<label for="employee_id" class="form-label">Employee ID</label>
							<input
							type="text"
							class="form-control"
							id="employee_id"
							name="employee_id"
							placeholder="Enter Employee ID"
							autofocus required
							/>
						</div>
						<div class="mb-3 form-password-toggle">
							<div class="d-flex justify-content-between">
								<label class="form-label" for="password">Password</label>
									{{-- <a href="#">
									<small>Forgot Password?</small>
								</a> --}}
							</div>
							<div class="input-group input-group-merge">
								<input
								type="password"
								id="password"
								class="form-control"
								name="password"
								placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
								aria-describedby="password" required
								/>
								<span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
							</div>
						</div>
						{{-- <div class="mb-3">
							<div class="form-check">
								<input class="form-check-input" type="checkbox" id="remember-me" />
								<label class="form-check-label" for="remember-me"> Remember Me </label>
							</div>
						</div> --}}
						<input type="hidden" name="user_ip" id="user_ip">
						<div class="mb-3">
							<button class="btn btn-primary d-grid w-40" type="submit" style="margin-left: 93px">LOGIN</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript">
	$.getJSON("https://api.ipify.org?format=json",
        function(data) {
        $("#user_ip").val(data.ip);
        console.log(data.ip);
    });
</script>
@endsection