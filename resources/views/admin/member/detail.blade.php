@extends('layouts.app')

@section('title', 'Member Detail – Khit Thit')
<style type="text/css">
	.form-label {
		text-transform: capitalize !important;
	}
	.form-box {
		border: 2px solid #CB9D4C;
		border-radius: 15px;
		padding: 2px 0px;
		width: 100px;
		height: 30px;
	}
	.edit-btn {
		padding: 7px 25px !important;
		float: right;
		border-radius: 50px !important;
		background-color: #fff;
		border-color: #23225C !important;
		color: #23225C !important;
	}

	.edit-btn:hover {
		background-color: #23225C !important;
		border-color: #23225C !important;
		color: #fff !important;
	}
	.col-12 {
		width: 600px;
		padding-left: 20px;
	}
	.card_body_detail {
    background-color: #fff; 
    border-radius: 10px; 
    padding: 20px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
	width: 700px;
}

</style>
@section('content')
	<div class="layout-wrapper layout-content-navbar">
	   	<div class="layout-container">
			@include('layouts.admin_sidebar', ['page'=>'MemberList'])

			<div class="layout-page" style="background-color:#fff">
				@include('layouts.nav', ['nav'=>'Member Detail', 'page'=>'MemberList'])

				<div class="content-wrapper">
					<div class="container-xxl flex-grow-1 container-p-y">
						<div class="">
							<a href="{{ url('admin/member') }}" style="cursor: pointer;"><label style="cursor: pointer;"><i class="menu-icon tf-icons bx bx-chevrons-left"></i> Back to list</label></a>
							<div class="space-20"></div>
							<div class="row mb-3">
								<div class="col-md-2">
									<label for="employee_id" class="form-label">Member ID</label>
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
								<div class="col-md-4 text-right">
									<a href="{{ url('/admin/member/edit/'. $member_list->id)}}">
										<button type="button" class="btn btn-outline-primary_list edit-btn">Edit</button>
									</a>
								</div>
							</div>
							
							<div class="space-20"></div>

							<h5>Point History</h5>
							<div class="col-xl">
								{{-- <div class="card mb-1"> --}}
									<div class="card_body_detail">
										<form class="mb-3" action="{{ url('/admin/member/edit/{member_id}') }}" method="POST" id="fx_form" enctype="multipart/form-data" >
											{{ csrf_field() }}
											<div class="col-12">
												<div class="row mb-3" style="width: 600px">
													<div class="col-md-3">
														<label for="employee_id" class="form-label">Date</label>		
													</div>
													<div class="col-md-2">
														<label for="name" class="form-label">Point in</label>
													</div>
													<div class="col-md-2">
														<label for="phone" class="form-label">Redeem</label>
													</div>
													<div class="col-md-2">
														<label for="member_point" class="form-label">Member ID</label>
													</div>
												</div>
												@foreach($point_list as $point)
													<div class="row mb-3" style="width: 600px">
														<div class="form-box">
															<div class="row mb-4">
																<div class="col-md-3">
																	<div>{!! date('M-j-Y', strtotime($point->created_at)) !!}</div>
																</div>
																<div class="col-md-2">
																	<div>+{!! $point->point_in !!}</div>
																</div>
																<div class="col-md-2">
																	<div>-{!! $point->redeem !!}</div>
																</div>
																<div class="col-md-3">
																	<div>{!! $point->employee_id !!}&nbsp;</div>
																</div>
															</div>
														</div>
													</div>
												@endforeach
												</div>
											</div>	
										</form>	
									</div>
								{{-- </div> --}}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection('content')
