@extends("la.layouts.app")

@section("contentheader_title", "Documents")
@section("contentheader_description", "Documents listing")
@section("section", "Documents")
@section("sub_section", "Listing")
@section("htmlheader_title", "Documents Listing")

@section("headerElems")
@la_access("Documents", "create")
	<button class="btn btn-success btn-sm pull-right" data-toggle="modal" data-target="#AddModal">Add Document</button>
@endla_access
@endsection

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box box-success">
	<!--<div class="box-header"></div>-->
	<div class="box-body">
		<table id="example1" class="table table-bordered">
		<thead>
		<tr class="success">
			@foreach( $listing_cols as $col )
			<th>{{ $module->fields[$col]['label'] or ucfirst($col) }}</th>
			@endforeach
			@if($show_actions)
			<th>Actions</th>
			@endif
		</tr>
		</thead>
		<tbody>
			
		</tbody>
		</table>
	</div>
</div>

@la_access("Documents", "create")
<div class="modal fade" id="AddModal" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Add Document</h4>
			</div>
			{!! Form::open(['action' => 'LA\CategoriesController@store', 'id' => 'document-add-form']) !!}
			<div class="modal-body">
				<div class="box-body">
                    <div class="form-group">
						<label for="title">Title* :</label>
						<input class="form-control" placeholder="Enter Title" data-rule-minlength="5" data-rule-maxlength="250" required="1" name="title" value="" aria-required="true" type="text">
					</div>

					<div class="form-group">
						<label for="title">Category* :</label>
						<select class="form-control" name="category_id">
							<option value="0">Select Category</option>
						</select>
					</div>

					<div class="form-group">
						<label for="description">Description* :</label>
						<textarea class="form-control" placeholder="Enter Description" required="1" cols="30" rows="3" name="description" aria-required="true"></textarea>
					</div>

					<div class="form-group">
						<label for="tags">Tags :</label>
						<select class="form-control select2-hidden-accessible" multiple="" rel="taginput" data-placeholder="Add multiple Tags" name="tags[]" tabindex="-1" aria-hidden="true"></select>
						<span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100px;">
							<span class="selection">
								<span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
									<ul class="select2-selection__rendered">
										<li class="select2-search select2-search--inline">
											<input class="select2-search__field" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Add multiple Tags" style="width: 100px;" type="search">
										</li>
									</ul>
								</span>
							</span>
						<span class="dropdown-wrapper" aria-hidden="true"></span>
						</span>
						</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				{!! Form::submit( 'Submit', ['class'=>'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@endla_access

@endsection

@push('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('la-assets/plugins/datatables/datatables.min.css') }}"/>
@endpush

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {
	$("#example1").DataTable({
		processing: true,
        serverSide: true,
        ajax: "{{ url(config('laraadmin.adminRoute') . '/category_dt_ajax') }}",
		language: {
			lengthMenu: "_MENU_",
			search: "_INPUT_",
			searchPlaceholder: "Search"
		},
		@if($show_actions)
		columnDefs: [ { orderable: false, targets: [-1] }],
		@endif
	});
	$("#document-add-form").validate({
		
	});
});
</script>
@endpush
