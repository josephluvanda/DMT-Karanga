@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/reminders') }}">Reminder</a> :
@endsection
@section("contentheader_description", $reminder->$view_col)
@section("section", "Reminders")
@section("section_url", url(config('laraadmin.adminRoute') . '/reminders'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Reminders Edit : ".$reminder->$view_col)

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
				{!! Form::model($reminder, ['route' => [config('laraadmin.adminRoute') . '.reminders.update', $reminder->id ], 'method'=>'PUT', 'id' => 'reminder-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'email')
					@la_input($module, 'data_category')
					@la_input($module, 'duration')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/reminders') }}">Cancel</a></button>
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
	$("#reminder-edit-form").validate({
		
	});
});
</script>
@endpush
