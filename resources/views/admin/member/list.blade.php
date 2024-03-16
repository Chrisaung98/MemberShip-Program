@extends('layouts.app')

@section('title', 'Member List – Khit Thit')
<style type="text/css">
	.flr {
		float: right;
	}
	.card {
		box-shadow: none !important;
	}
	.show {
		margin-left: 800px;
	}
	.all {
		margin-top: -15px;
	}
	.create-btn {
		margin-top: -2px;
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
	.btn-outline-primary_list {
		margin-top: -2px;
		display: inline-block;
		text-align: center;
		border-radius: 50px !important;
		background-color: #fff;
		border-color: #23225C !important;
		color: #23225C !important;
	}
	.btn-outline-primary_list:hover {
		background-color: #23225C !important;
		color: #fff !important;
	}
</style>
@section('content')
<div class="layout-wrapper layout-content-navbar">
   	<div class="layout-container">
		@include('layouts.admin_sidebar', ['page'=>'MemberList'])

		<div class="layout-page" style="background-color:#fff">
			@include('layouts.nav', ['nav'=>'Member List', 'page'=>'Page'])

			<div class="content-wrapper">
				<div class="container-xxl flex-grow-1 container-p-y">
					<div class="row">
						<form id="formAuthentication" class="mb-3" action="{{ url('/admin/member/filter/') }}" method="POST">
							{{ csrf_field() }}
							<div class="col-12 text-right">
								<label class="all" id="totalMembersLabel" for="show_entries">All({{ $totalCount }})</label>
								<div class="show">
									<input type="date" name="created_at" class="form-control-date rounded" placeholder="mm-dd-yy" aria-label="Search" aria-describedby="search-addon">&nbsp;&nbsp;
									<input type="search" name="name" class="form-control-name rounded" placeholder="Search by name" aria-label="Search" aria-describedby="search-addon">&nbsp;&nbsp;
									<button type="submit" class="btn create-btn btn-outline-primary w-30">Filter</button>
								</div>
							</div>
    					
							<div class="col-12">
								<div class="card mt-4">
									<div class="table-responsive text-nowrap">
										<table class="table">
											<thead>
												<tr>
													<th width="20">No</th>
													<th>Name</th>
													<th>Membership Date</th>
													<th>Member Point</th>
													<th>Actions</th>
												</tr>
											</thead>
											
											<tbody class="table-border-bottom-0">
												@php $member_count=1; @endphp
												@foreach($member_list as $member)
													<tr>
														<td>{{ $member_count }}</td>
														<td>{{ $member->name }}</td>
														<td>{!! date('M-j-Y', strtotime($member->created_at)) !!}</td>
														<td>{{ $member->member_point }}</td>
														<td>
															<a href="{{ url('/admin/member/detail/'. $member->id)}}">
																<button type="button" class="btn btn-outline-primary_list">
																	View Detail
																</button>
															</a>
															<a href="{{ url('/admin/member/edit/'. $member->id)}}">
																<button type="button" class="btn btn-outline-primary_list">
																	Edit
																</button>
															</a>
															<div class="modal fade" id="backDropModal_{{$member->id}}" data-bs-backdrop="static" tabindex="-1">
																<div class="modal-dialog modal-dialog-centered">
																	<form class="modal-content" action="{{ url('') }}" method="post">
																		{{ csrf_field() }}
																		<div class="modal-header">					
																			<button
																			type="button"
																			class="btn-close"
																			data-bs-dismiss="modal"
																			aria-label="Close"
																			></button>
																		</div>
																		<div class="modal-body">
																			<div class="row">
																				<h5 class="modal-title" id="backDropModalTitle">Are you sure want to delete this Member?</h5>
																				<div class="col mb-3">
																					<input
																					type="hidden"
																					name="atm_id"
																					class="form-control"
																					value="{{$member->id}}"
																					/>
																				</div>
																			</div>
																		</div>
																		<div class="modal-footer">
																			<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
																			Close
																			</button>
																			<button type="submit" class="btn btn-primary">Delete</button>
																		</div>
																	</form>
																</div>
															</div>
														</td>
													</tr>
													@php
														$member_count = $member_count+1;
													@endphp
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
    function filterMembers() {
        let dateFilter = document.getElementById('membership_date').value;
        let nameFilter = document.getElementById('search_name').value.toLowerCase();

        let rows = document.querySelectorAll('#memberTableBody tr');

        rows.forEach(row => {
            let dateCell = row.getElementsByTagName('td')[2].innerText;
            let nameCell = row.getElementsByTagName('td')[1].innerText.toLowerCase();

            if (dateCell.includes(dateFilter) && nameCell.includes(nameFilter)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }
</script>
@endsection('content')