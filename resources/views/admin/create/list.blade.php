@extends('layouts.app')

@section('title', 'Create Member – Khit Thit')
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
		background-color: #23225C;
  		background-image: linear-gradient(to right bottom, #23225C , #CB9D4C);
		width: 10%;
		font-size: 20px;
		line-height: 50px;
		display: inline-block;
		color: #fff;
		border-radius: 50px !important;
		font-weight: 500;
	}
	.member-id-holder {
		background-color: #23225C;
		background-image: linear-gradient(to right bottom, #23225C , #CB9D4C);
		color: #fff;
		padding: 10px 20px;
		border-radius: 50px !important;
	}
	.create-btn {
		display: inline-block;
		text-align: center;
		border-radius: 50px !important;
		background-color: #fff;
		border-color: #23225C !important;
		color: #23225C !important;
	}
	.create-btn:hover {
		background-color: #23225C !important;
		color: #fff !important;
	}
</style>
@section('content')
	<div class="layout-wrapper layout-content-navbar">
	   	<div class="layout-container">
			@include('layouts.admin_sidebar', ['page'=>'CreateMember'])

			<div class="layout-page" style="background-color: #fff">
				@include('layouts.nav', ['nav'=>'Create Member', 'page'=>'Page'])

				<div class="space-20"></div>
				<div class="content-wrapper" style="background-color:#fff">
					<div class="container-xxl flex-grow-1 container-p-y">
						<div class="form-box">
							<div class="row">
								<form id="formAuthentication" class="mb-3" action="{{ url('/admin/addmember') }}" method="POST">
									{{ csrf_field() }}
									<div class="row mb-3">
										<div class="col-mb-12">
											<p class="form-control_member" id="employee_id" name="employee_id">Member ID &nbsp;<span class="member-id-holder">KT_M_{{$member_id}}</span></p>
											<input type="hidden" name="member_id" value="{{$member_id}}">
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-md-4">
											<label for="name" class="form-label">Name</label>
											<input type="text" class="form-control form-input-txt" id="name" name="name" placeholder="" required />
										</div>
										<div class="col-md-4">
											<label for="phone" class="form-label">Phone</label>
											<input type="text" class="form-control form-input-txt" id="phone" name="phone" placeholder="09 123 456 789" required />
										</div>
										<div class="col-md-4">
											<label for="amount" class="form-label">Expensed Amount</label>
											<input type="text" class="form-control form-input-txt" id="amount" name="amount" placeholder="100000" required />
										</div>
									</div>
									<div class="space-20"></div>
									<div class="row mb-3">
										<div class="col-md-12 text-center">
											<p class="point fw-semibold" style="font-size: 18px;">Point By Expensed Amount</p>
											<p class="point-holder text-center" id="memberPoints">+ 0&nbsp;Pts</p>
											<input type="hidden" name="member_point" id="member_point" value="">
										</div>
									</div>
									<div class="space-20"></div>
									<div class="row">
										<div class="col-md-12 text-center">
											<span class="fill" style="color: #858585;font-size: 12px;">Fill in the bank information</span>
											<div class="space-10"></div>
											<button type="submit" class="btn create-btn btn-outline-primary w-30">Save Change</button>
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

	<script src="{{ url('/js/jquery.js') }}"></script>
	<script>
		$("#amount").keyup(function(){
			var amount = parseInt($("#amount").val());
			console.log(amount);
			if(amount >= 5000){
				var point_gain = parseInt(amount/5000);
				$("#memberPoints").text('+ ' + point_gain + ' Pt');
				$("#member_point").val(point_gain);
			} else {
				$("#memberPoints").text('+ 0 Pts');
				$("#member_point").val('0');
			}
		});
	</script>
@endsection('content')