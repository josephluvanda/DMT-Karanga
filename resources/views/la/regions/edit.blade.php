@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/regions') }}">Region</a> :
@endsection
@section("contentheader_description", $region->$view_col)
@section("section", "Regions")
@section("section_url", url(config('laraadmin.adminRoute') . '/regions'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Regions Edit : ".$region->$view_col)

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

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($region, ['route' => [config('laraadmin.adminRoute') . '.regions.update', $region->id ], 'method'=>'PUT', 'id' => 'region-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'position')
					@la_input($module, 'description')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/regions') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#region-edit-form").validate({
		
	});
});
</script>
@endpush
