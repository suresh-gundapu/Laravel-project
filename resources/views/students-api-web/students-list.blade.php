@extends('layouts.app')
@section('content')
<div class="container-fluid mt-3">
	<div class="row d-flex justify-content-center g-0">
		<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
			<div class="card card-registration me-3">
				<div class="card-header">
					<div class="row">
						<div class="col-sm-12 col-md-6 col-lg-6">
							<div class="form-floating">
								<h4>Students - List</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="card-body px-4 py-4 text-black card-border-0 rounded-end">
					<div class="row justify-content-center">
						<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 col-xxl-12">
							<div id="toolbar">
								<a href="{{ url('crud/add') }}" class="btn btn-primary"><i class="fa-solid fa-plus"></i>&nbsp;Add New</a>
								@include('layouts.status-nav-bar')
							</div>
							<table id="table" data-toolbar="#toolbar" data-toggle="table" data-ajax="ajaxRequest" data-search="true" data-buttons-align="right" data-show-refresh="true" data-show-toggle="true" data-show-fullscreen="true" data-buttons-class="primary" data-show-columns="true" data-show-columns-toggle-all="true" data-page-size="20" data-side-pagination="server" data-page-list="[10, 25, 50, 100, all]" data-pagination="true" data-sort-class="table-active" data-sortable="true" data-sort-name="first_name" data-sort-order="asc">
								<thead>
									<tr>
										<th data-checkbox="true"></th>
										<th data-field="first_name" data-sortable="true" data-formatter="LinkFormatter">First Name</th>
										<th data-field="last_name" data-sortable="true">Last Name</th>
										<th data-field="email" data-sortable="true">Email</th>
										<th data-field="mobile" data-sortable="true">Mobile</th>
										<th data-field="profile" data-sortable="true" data-formatter="ImageFormatter">Profile</th>
										<th data-field="status" data-sortable="true" data-halign="center" data-align="center">Status</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@push('scripts')
<script>
	var listingUrl = "{{ url('crudAPIListing') }}";
	var updateUrl = "{{ url('crud-api/updateStatus') }}";
	var deleteUrl = "{{ url('crud-api/deleteAll') }}";
	var imageUrl = "{{asset('upload/students')}}"
</script>
<script type="text/javascript" src="{{ asset('js/listing.js') }}"></script>
@endpush