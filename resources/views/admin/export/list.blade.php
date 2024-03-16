@extends('layouts.app')

@section('title', 'Export - Khit Thit')
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
		margin: -57px 0 0 617px;
	}
	.btn-outline-primary:hover {
		background-color: #23225C !important;
		border-color: #23225C !important;
		color: #fff !important;
	}
</style>
@section('content')
<div class="layout-wrapper layout-content-navbar">
	<div class="layout-container">
	@include('layouts.admin_sidebar', ['page'=>'Export'])

    <div class="layout-page" style="background-color: #fff">
        @include('layouts.nav', ['nav'=>'Export', 'page'=>'Export'])
            <div class="content-wrapper" style="background-color:#fff">
				<div class="container-xxl flex-grow-1 container-p-y">
				

					<div class="space-20"></div>
						
					<div class="form-box">
						<div class="row">
							<form id="formAuthentication" class="mb-3" action="{{ url('/members/export') }}" method="POST">
								{{ csrf_field() }}
								<div class="row mb-3">
									<div class="col-md-3">
										<label for="from_date" class="form-label">Export From Date</label>
										<input type="date" class="form-control form-control-create" id="from_date" name="from_date" placeholder="Select a date">
									</div>
									<div class="col-md-3">
										<label for="to_date" class="form-label">Export To Date</label>
										<input type="date" class="form-control form-control-create" id="to_date" name="to_date" placeholder="Select a date">
									</div>
								</div>
									<div class="mb-3">
										<button type="submit" class="btn check-number-btn btn-outline-primary d-grid w-30" >Export</button>
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