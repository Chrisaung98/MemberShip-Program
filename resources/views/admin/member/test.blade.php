@extends('layouts.app')

@section('title', 'Create Member – Khit Thit')
<style type="text/css">
	.flr {
		float: right;
	}
</style>
@section('content')
	<div class="layout-wrapper layout-content-navbar">
	   	<div class="layout-container">
			@include('layouts.admin_sidebar', ['page'=>'CreateMember'])

			<div class="layout-page" style="background-color: #fff">
				@include('layouts.nav', ['nav'=>'Create Member', 'page'=>'Page'])

				<div class="content-wrapper" style="background-color:#fff">
					<div class="container-xxl flex-grow-1 container-p-y">
						
						<br>
						<div class="border border-9">
							<div class="row">
								<form id="formAuthentication" class="mb-3" action="{{ url('/admin/addmember') }}" method="POST">
									{{ csrf_field() }}
									<div class="row mb-3">
										<div class="col-md-3">
											<label for="employee_id" class="form-label">Member ID</label>
										</div>

										{{-- @foreach($member_list as $member){{ isset($employee_id) ? $employee_id : '' }} --}}
										<div class="col-mb-2">
											<p class="form-control_member" id="employee_id" name="employee_id"></p>
										</div>
										{{-- @endforeach --}}
										<!-- <div class="col-mb-2">
											<p class="form-control_member" id="employee_id" name="employee_id">{{$last_member_id}}</p>
										</div> -->
									</div>
									<div class="row mb-3">
										<div class="col-md-3">
											<label for="name" class="form-label">Name</label>
											<input type="text" class="form-control_create" id="name" name="name" placeholder=""/>
										</div>&nbsp;&nbsp;&nbsp;
										<div class="col-md-3">
											<label for="phone" class="form-label">Phone</label>
											<input type="text" class="form-control_create" id="phone" name="phone" placeholder="09 123 456 789"/>
										</div>&nbsp;&nbsp;&nbsp;
										<div class="col-md-3">
											<label for="amount" class="form-label">Expensed Amount</label>
											<input type="text" class="form-control_create" id="amount" name="amount" placeholder="100000.00"/>
										</div>
									</div>
									<br><br>
									<div class="row mb-3">
										<span class="point">Point By Expensed Amount</span>
									</div>
									<div class="mb-3">
										<p class="form-control_xpoint" id="memberPoints">0&nbsp;Pts</p>
									</div>
									<br><br>
									<div class="mb-3">
										<span class="fill">Fill in the bank information</span>
										<div class="space-10"></div>
											<button type="submit" class="btn  btn-outline-primary d-grid w-30">Save Change</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
		$("#amount").keyup(function(){
			var amount = parseInt($("#amount").val());
			if(amount >= 5000){
				var point_gain = parseInt(amount/5000);
				$("#memberPoints").text(point_gain + ' Pt');
			} else {
				$("#memberPoints").text('0 Pt');
			}
		});
	</script>
@endsection('content')