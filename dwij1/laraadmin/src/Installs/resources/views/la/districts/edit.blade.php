@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/districts') }}">Districts</a> :
@endsection
@section("contentheader_description", $district->$view_col)
@section("section", "Districts")
@section("section_url", url(config('laraadmin.adminRoute') . '/districts'))
@section("sub_section", "Edit")

@section("htmlheader_title", "District Edit : ".$district->$view_col)

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
				{!! Form::model($district, ['route' => [config('laraadmin.adminRoute') . '.districts.update', $district->id ], 'method'=>'PUT', 'id' => 'district-edit-form']) !!}
					@la_form($module)

					{{--
					@la_input($module, 'name')
					@la_input($module, 'region')
					@la_input($module, 'description')
					--}}
					<br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/districts') }}">Cancel</a></button>
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
	$("#district-edit-form").validate({

	});
});
</script>
@endpush
