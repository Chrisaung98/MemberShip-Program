@extends('layouts.app')

@section('title', 'Update Member – Khit Thit')
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
			@include('layouts.admin_sidebar', ['page'=>'MemberList'])

			<div class="layout-page" style="background-color:#fff">
				@include('layouts.nav', ['nav'=>'Updae Member', 'page'=>'MemberList'])
				<div class="content-wrapper" style="background-color:#fff">
					<div class="container-xxl flex-grow-1 container-p-y">
						<a href="{{ url('admin/member') }}" style="cursor: pointer;"><label class="form-label" style="cursor: pointer;"><i class="menu-icon tf-icons bx bx-chevrons-left"></i> Back to list</label></a>
						<br><br>
						<div class="form-box">
							<div class="row">
								<form id="formAuthentication" class="mb-3" action="{{ url('/admin/member/update/') }}" method="POST">
									{{ csrf_field() }}
									<div class="row mb-3">
										<input type="hidden" name="member_id" value="{{$member_list->id}}">
										<div class="col-md-3">
											<label for="employee_id" class="form-label">Employee ID</label>&nbsp;
										</div>
										<div class="col-md-2">
											<p>{!! $member_list->employee_id !!}</p>
										</div>
									</div>
									<div class="row mb-3">
										<div class="col-md-3">
											<label for="name" class="form-label">Name</label>
											<input type="text" class="form-control form-input-txt" id="name" name="name" value="{!! $member_list->name !!}"/>
										</div>&nbsp;&nbsp;&nbsp;
										<div class="col-md-3">
											<label for="phone" class="form-label">Phone</label>
											<input type="text" class="form-control form-input-txt" id="phone" name="phone" value="{!! $member_list->phone !!}"/>
										</div>
									</div>
									<br>
									<div class="mb-4">
										<div class="space-10"></div>
										<button type="submit" class="btn create-btn btn-outline-primary w-30">Save Change</button>
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