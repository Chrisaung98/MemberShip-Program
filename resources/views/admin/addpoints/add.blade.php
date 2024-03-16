@extends('layouts.app')

@section('title', 'Add Points – Khit Thit')
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
	.form-box-green {
		border: 2px solid rgb(2, 184, 2);
		border-radius: 10px;
		padding: 30px 20px;
		/* display: none; */
	}
	.bi-check-circle {
		text-align: center;
	}
	.form-box-view {
		border: 2px solid #CB9D4C;
		border-radius: 15px;
		padding: 2px 0px;
		width: 100px;
		height: 30px;
	}
	.col-12 {
		width: 600px;
		margin: 0 auto;
		text-align: center;
	}
	.form-label-point {
		width: 600px;
		margin: 0 auto;
		text-align: center;
	}
	.form-select-option {
		width: 150px;
		margin: 0 auto;
		text-align: center;
		
		border: none;
		text-align-last: center;
		border-bottom: 1px solid transparent;
		transition: border-bottom 0.3s;
	}

	.form-select-option:focus,
	.form-select-option:hover {
    	border-bottom: 1px solid #000;
	}

	.circle-icon i {
		display: inline-block;
		font-size: 30px;
		color: #fff;
		background-color:  rgb(0, 181, 0);
		border-radius: 50%;
		width: 30px;
		height: 30px;
		line-height: 40px;
	}
</style>
@section('content')
	<div class="layout-wrapper layout-content-navbar">
	   	<div class="layout-container">
			@include('layouts.admin_sidebar', ['page'=>'AddPoint'])

			<div class="layout-page">
				@include('layouts.nav', ['nav'=>'Add Point', 'page'=>'AddPoint'])
				<div class="content-wrapper" style="background-color:#fff">
					<div class="container-xxl flex-grow-1 container-p-y">
						<a href="{{ url('admin/addpoints') }}" style="cursor: pointer;"><label class="form-label" style="cursor: pointer;"><i class="menu-icon tf-icons bx bx-chevrons-left"></i> Back to Check Number</label></a>

						<div class="space-20"></div>
						
						<div class="form-box">
							<div class="row">
								<div class="row mb-3">
									<div class="col-md-3">
										<label for="employee_id" class="form-label">Employee ID</label>
										<div>{!! $member_list->employee_id !!}</div>
									</div>
									<div class="col-md-3">
										<label for="name" class="form-label">Name</label>
										<div>{!! $member_list->name !!}</div>
									</div>
									<div class="col-md-3">
										<label for="phone" class="form-label">Phone</label>
										<div>{!! $member_list->phone !!}</div>
									</div>
									<div class="col-md-3">
										<label for="member_point" class="form-label">Total Points</label>
										<div>{!! $member_list->member_point !!}&nbsp;Pts</div>
									</div>
								</div>
								<div class="space-20"></div>
								<form id="formAuthentication" class="mb-3" action="{{ url('/admin/addpoints/pointAdd/') }}" method="POST">
									{{ csrf_field() }}
									<input type="hidden" name="employee_id" value="{{ $member_list->employee_id }}">
									<div class="row mb-3">
										<div class="col-md-3">
											<label for="amount" class="form-label">Total Expensed Amount</label>
											<input type="text" class="form-control form-input-txt" id="amount" name="amount" placeholder="100000.00"/>
										</div>
									</div>
									
									<div class="space-20"></div>

									<div class="row mb-3">
										<div class="col-mb-12">
											<p class="form-control_member" id="point-holder">Point By Expensed Amount &nbsp;<span class="member-id-holder" id="memberPoints">+ 0&nbsp;Pts</span></p>
											<input type="hidden" name="member_id" value="">
										</div>	
									</div>
									<br>
									<div class="mb-4">
										<button type="submit" class="btn check-number-btn btn-outline-primary w-30" style="margin-left: 20px">Add Point</button>
									</div>
								</form>
							</div>
						</div>
						<br><br>
						<div class="form-box-green" id="successMessage" style="text-align: center;">
							<div class="circle-icon">
								<i class="bi bi-check-circle"></i>
								<h5>Points added successfully</h5>
							<div>
							
							<br><br>
							<div class="col-xl">
								<div class="card_body_detail">
									<form class="mb-3" action="{{ url('/admin/member/edit/{member_id}') }}" method="POST" id="fx_form" enctype="multipart/form-data">
										{{ csrf_field() }}
										<div class="col-12" style="width: 600px; margin: 0 auto;">
											<div class="row mb-3" style="text-align: center">
												<div class="col-md-6">
                                                    <select id="viewHistory" class="form-select-option" style="text-align: center;">
                                                        <option value="all">View Point History</option>
														<option value="recent">View Point History</option>
                                                    </select>
												</div>
											</div><br>
											<div class="point-history">
												<div class="row mb-3" style="width: 600px;">
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
												<div class="row mb-3" style="width: 600px;">
													<div class="form-box-view">
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
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			document.getElementById('viewHistory').addEventListener('change', function () {
				var selectedOption = this.value;
				var pointHistory = document.querySelector('.point-history');
	
				if (selectedOption === 'recent') {
					pointHistory.style.display = 'block';
				} else {
					pointHistory.style.display = 'none';
				}
			});
		});
		$("#amount").keyup(function(){
			var amount = parseInt($("#amount").val());

			if(amount >= 5000){
				var point_gain = parseInt(amount/5000);
				$("#memberPoints").text('+ ' + point_gain + ' Pt');
				$("#member_point").val(point_gain);
			} else {
				$("#memberPoints").text('+ 0 Pts');
				$("#member_point").val('0');
			}
		});
		const urlParams = new URLSearchParams(window.location.search);
    	const pointAddedSuccess = urlParams.get('point_added_success');
		
		if (pointAddedSuccess) {
			document.getElementById('successMessage').style.display = 'block';
		}
	</script>
@endsection('content')