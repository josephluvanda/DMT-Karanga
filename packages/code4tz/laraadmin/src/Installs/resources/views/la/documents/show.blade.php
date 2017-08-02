@extends('la.layouts.app')

@section('htmlheader_title')
	Document View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	<div class="bg-primary clearfix">
		<div class="col-md-10">
			<div class="row">
				<div class="col-md-3">
					<!--<img class="profile-image" src="{{ asset('la-assets/img/avatar5.png') }}" alt="">-->
					<div class="profile-icon text-primary"><i class="fa {{ $module->fa_icon }}"></i></div>
				</div>
				<div class="col-md-9">
					<h4 class="name">{{ $document->$view_col }}</h4>
				</div>
			</div>
		</div>
		<div class="col-md-1 actions">
			@la_access("Documents", "edit")
				<a href="{{ url(config('laraadmin.adminRoute') . '/documents/'.$document->id.'/edit') }}" class="btn btn-xs btn-edit btn-default"><i class="fa fa-pencil"></i></a><br>
			@endla_access
			
			@la_access("Documents", "delete")
				{{ Form::open(['route' => [config('laraadmin.adminRoute') . '.documents.destroy', $document->id], 'method' => 'delete', 'style'=>'display:inline']) }}
					<button class="btn btn-default btn-delete btn-xs" type="submit"><i class="fa fa-times"></i></button>
				{{ Form::close() }}
			@endla_access
		</div>
	</div>

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/documents') }}" data-toggle="tooltip" data-placement="right" title="Back to Documents"><i class="fa fa-chevron-left"></i></a></li>
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
						@la_display($module, 'title')
						@la_display($module, 'category')
						@la_display($module, 'document')
						@la_display($module, 'description')
						@la_display($module, 'ward')
						@la_display($module, 'tags')
						@la_display($module, 'public')
						@la_display($module, 'added_by')
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
</div>
@endsection
