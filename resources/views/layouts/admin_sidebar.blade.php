<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
  	<div class="app-brand demo">
    	<a href="{{ url('/') }}" target="_blank" class="app-brand-link">
    		<img src="{{ url('/images/kt-text-logo.png') }}" class="img-fluid" style="width: 63%;margin: 0 auto;">
		</a>

		<a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
			<i class="bx bx-chevron-left bx-sm align-middle"></i>
		</a>
	</div>

	<div class="menu-inner-shadow"></div>

	<ul class="menu-inner py-1"  style="background-color: #23225C;">
		<!-- Member List -->
		<br>
		@if($page == 'MemberList')
			<li class="menu-item active">
		@else
			<li class="menu-item">
		@endif
			<a href="{{ url('/admin/member') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bx-list-ul'></i>
				<div>Member List</div>
			</a>
		</li>

		<!-- Create Member -->
		@if($page == 'CreateMember')
			<li class="menu-item active">
		@else
			<li class="menu-item">
		@endif
			<a href="{{ url('/admin/create') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bx-user-plus'></i>
				<div>Create Member</div>
			</a>
		</li>

		<!-- Add Point -->
		@if($page == 'AddPoint')
			<li class="menu-item active">
		@else
			<li class="menu-item">
		@endif
			<a href="{{ url('/admin/addpoints') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bx-plus-circle' ></i>
				<div>Add Points</div>
			</a>
		</li>

		<!-- Redeem -->
		@if($page == 'Redeem')
			<li class="menu-item active">
		@else
			<li class="menu-item">
		@endif
			<a href="{{ url('/admin/redeem/') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bx-minus-circle' ></i>
				<div>Redeem</div>
			</a>
		</li>


		<!-- Export -->
		@if($page == 'Export')
			<li class="menu-item active">
		@else
			<li class="menu-item">
		@endif
			<a href="{{ url('/admin/export/list') }}" class="menu-link">
				<i class='menu-icon tf-icons bx bxs-file-export' ></i>
				<div>Export</div>
			</a>
		</li>

		{{-- Logout --}}
		@if($page == 'Logout')
			<li class="menu-item active">
		@else
			<li class="menu-item">
		@endif
			<a href="{{ url('/admin/logout') }}" class="menu-link" style="position:fixed;margin-top:500px;">
				<i class='menu-icon tf-icons bx bx-log-out-circle'></i>
				<div>Logout</div>
			</a>
		</li>
	</ul>
</aside> 	

		

		

		
