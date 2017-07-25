@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/registrations') }}">Registration</a> :
@endsection
@section("contentheader_description", $registration->$view_col)
@section("section", "Registrations")
@section("section_url", url(config('laraadmin.adminRoute') . '/registrations'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Registrations Edit : ".$registration->$view_col)

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
				{!! Form::model($registration, ['route' => [config('laraadmin.adminRoute') . '.registrations.update', $registration->id ], 'method'=>'PUT', 'id' => 'registration-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'status')
					@la_input($module, 'firstname')
					@la_input($module, 'middlename')
					@la_input($module, 'email')
					@la_input($module, 'surname')
					@la_input($module, 'mobile')
					@la_input($module, 'registration_reason')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/registrations') }}">Cancel</a></button>
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
	$("#registration-edit-form").validate({
		
	});
});
</script>
@endpush
