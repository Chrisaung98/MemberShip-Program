@extends('layouts.app')

@section('title', 'Redeem Points – Khit Thit')
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
	.point-holder {
		width: 15%;
	}
	.member-id-holder {
		background-color: #23225C;
  		background-image: linear-gradient(to right bottom, #23225C , #CB9D4C);
  		color: #fff;
  		padding: 10px 20px;
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
			@include('layouts.admin_sidebar', ['page'=>'Redeem'])

			<div class="layout-page" style="background-color: #fff">
				@include('layouts.nav', ['nav'=>'View Redeem', 'page'=>'Redeem'])
				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">
						<a href="{{ url('admin/redeem') }}" style="cursor: pointer;"><label class="form-label" style="cursor: pointer;"><i class="menu-icon tf-icons bx bx-chevrons-left"></i> Back to Redeem Number</label></a>

						<div class="space-20"></div>
						
						<div class="form-box">
							<div>
								<div class="row">
									<div class="row mb-3">
										<div class="col-md-2">
											<label for="employee_id" class="form-label">Employee ID</label>
											<div>{!! $member_list->employee_id !!}</div>
										</div>
										<div class="col-md-2">
											<label for="name" class="form-label">Name</label>
											<div>{!! $member_list->name !!}</div>
										</div>
										<div class="col-md-2">
											<label for="phone" class="form-label">Phone</label>
											<div>{!! $member_list->phone !!}</div>
										</div>
										<div class="col-md-2">
											<label for="member_point" class="form-label">Total Points</label>
											<div>{!! $member_list->member_point !!}&nbsp;Pts</div>
										</div>
									</div>
									<div class="space-20"></div>
									<form id="formAuthentication" class="mb-3" action="{{ url('/admin/redeem/pointRedeem/') }}" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="employee_id" value="{{ $member_list->employee_id }}">
										<div class="row mb-3">
											<div class="col-md-3">
												<label for="redeem" class="form-label">Total Redeem Points</label>
												<input type="text" class="form-control form-input-txt" id="redeem" name="redeem" placeholder="" required />
											</div>
										</div>
										<div class="space-20"></div>
										<div class="">
											<button type="submit" class="btn check-number-btn btn-outline-primary w-30">Redeem Point</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection('content')