@extends('la.layouts.app')

@section('htmlheader_title')
	Organization View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	<div class="bg-primary clearfix">
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-3">
					<!--<img class="profile-image" src="{{ asset('la-assets/img/avatar5.png') }}" alt="">-->
					<div class="profile-icon text-primary"><i class="fa {{ $module->fa_icon }}"></i></div>
				</div>
				<div class="col-md-9">
					<h4 class="name">{{ $organization->$view_col }}</h4>
				</div>
			</div>
		</div>
		<div class="col-md-3">
		</div>
		<div class="col-md-4">
		</div>
		<div class="col-md-1 actions">
			@la_access("Organizations", "edit")
				<a href="{{ url(config('laraadmin.adminRoute') . '/organizations/'.$organization->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
			@endla_access

			@la_access("Organizations", "delete")
				{{ Form::open(['route' => [config('laraadmin.adminRoute') . '.organizations.destroy', $organization->id], 'method' => 'delete', 'style'=>'display:inline']) }}
					<button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
				{{ Form::close() }}
			@endla_access
		</div>
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/organizations') }}" data-toggle="tooltip" data-placement="right" title="Back to Organizations"><i class="fa fa-chevron-left"></i></a></li>
		<li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active fade in" id="tab-info">
			<div class="tab-content">
				<div class="panel infolist">
					<div class="panel-default panel-heading">
						<h4>General Info</h4>
					</div>
					<div class="panel-body">
						@la_display($module, 'name')
						@la_display($module, 'email')
						@la_display($module, 'phone')
						@la_display($module, 'website')
						@la_display($module, 'assigned_to')
						@la_display($module, 'connect_since')
						@la_display($module, 'address')
						@la_display($module, 'city')
						@la_display($module, 'description')
						@la_display($module, 'profile_image')
						@la_display($module, 'profile')
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
</div>
@endsection
