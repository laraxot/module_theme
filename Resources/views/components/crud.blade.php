<div class="content">
	<div class="clearfix"></div>
	@include('formx::includes.flash')
	<div class="card">
		<div class="card-header">
			<ul class="nav nav-tabs align-items-end card-header-tabs w-100">
                @can('index',$_panel)
				<li class="nav-item">
					<a class="nav-link active" href="{{ $_panel->url(['act'=>'index']) }}">
					<i class="fa fa-list mr-2">
					</i>{{ trans('adm_theme::lang.'.last($containers).'_table') }}
					</a>
                </li>
                @endcan
				@can('create',$_panel)
				<li class="nav-item">
					<a class="nav-link" href="{{ $_panel->url(['act'=>'create']) }}">
					<i class="fa fa-plus mr-2"></i>
					{{ trans('adm_theme::lang.'.last($containers).'_create') }}
					</a>
				</li>
                @endcan
                @can('edit',$_panel)
				<li class="nav-item">
					<a class="nav-link" href="{{ $_panel->url(['act'=>'edit']) }}">
					<i class="fa fa-edit mr-2"></i>
					{{ trans('adm_theme::lang.'.last($containers).'_edit') }}
					</a>
				</li>
				@endcan
				{{--
				@include('layouts.right_toolbar', compact('dataTable'))
				--}}
			</ul>
		</div>
		<div class="card-body">
			{{ $content }}
			<div class="clearfix"></div>
		</div>
	</div>
</div>
