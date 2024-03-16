@extends('layouts.app')

@section('title', 'Add Points - Khit Thit ')
<style type="text/css">
	.form-box {
		border: 2px solid #CB9D4C;
		border-radius: 10px;
		padding: 30px 20px;
	}
	.form-input-txt {
		border: 0.5px solid #CB9D4C !important;
		border-radius: 50px !important;
	}
	.check-number-btn {
		border-radius: 50px !important;
		background-color: #fff;
		border-color: #23225C !important;
		color: #23225C !important;
	}
	.check-number-btn:hover {
		background-color: #23225C !important;
		border-color: #23225C !important;
		color: #fff !important;
	}
</style>
@section('content')
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
	@include('layouts.admin_sidebar', ['page'=>'AddPoint'])

    <div class="layout-page" style="background-color: #fff">
        @include('layouts.nav', ['nav'=>'Add Point', 'page'=>'AddPoint'])
            <br>
            <div class="content-wrapper" style="background-color:#fff">
				<div class="container-xxl flex-grow-1 container-p-y">
					<div class="form-box">
						<div class="row">
							<form id="formAuthentication" class="mb-3" action="{{ url('/admin/addpoints/check-number') }}" method="POST">
								{{ csrf_field() }}
								<div class="row mb-3">
									<div class="col-md-3">
										<label for="phone" class="form-label">Phone</label>
										<input type="text" class="form-control form-input-txt" id="phone" name="phone" placeholder="09 123 456 789" required />
									</div>
									<div class="col-md-3">
										<label for="phone" class="form-label">&nbsp;</label>
										<button type="submit" class="btn check-number-btn btn-outline-primary d-grid w-30" >Check Number</button>
									</div>
                                </div>
							</form>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>

@endsection('content')