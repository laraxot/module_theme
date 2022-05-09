@php
//dddx($view_comp_dir);// !! devo trovare uno standard
Theme::add($view_comp_dir . '/js/gear.js');
Theme::add($view_comp_dir . '/css/gear.css');
//------- da uri a view ..
//dddx($view);//pub_theme::restaurant.cuisine.index
//dddx($_SERVER['REQUEST_URI']);///it/restaurant/pizzeria-cicala-messina/cuisine
//$url_t=route('containers.index',['container0'=>'translation','uri'=>$_SERVER['REQUEST_URI'] ]);
@endphp

<div class="color-palate">
    <div class="color-trigger">
        {{-- <i class="fa fa-gear"></i> --}}
        <i class="fas fa-cog fa-2x" style="color:white;"></i>
    </div>
    <div class="color-palate-head">
        <h6>@lang('manage')</h6>
    </div>
    <br>
    <div class="palate-foo">
        {{-- @if (!isset($params['container1']))
		<a href="{{ route('containers.show',$params) }}" class="btn theme-btn" >
		@lang($view_default.'.view_page')<i class="fa fa-show"></i>
		</a>
		@else
		<a href="{{ route('containers.show',$params) }}" class="btn theme-btn" >
		@lang($view_default.'.view_page')<i class="fa fa-show"></i>
		</a>
		@endif
		@include('pub_theme::layouts.partials.btns.translate_manager') --}}
        <div class="btn-group-vertical">
            @foreach ($btns as $btn)
                <a href="{{ $btn->url }}" class="btn btn-primary" @if ($btn->modal) data-toggle="modal" data-target="#myModalAjax" data-title="languages" data-href="{{ $btn->url }}" @endif>
                    <i class="{{ $btn->icon }}"></i>{{ $btn->title }}
                </a>
            @endforeach
            {{-- <a href="{{ $gear_route }}" class="btn btn-primary">
			<i class="far fa-edit"></i>{{ $gear_act }}
		</a>
		<a href="{{ $url_t }}" class="btn btn-primary" data-toggle="modal" data-target="#myModalAjax" data-title="languages" data-href="{{ $url_t }}">
			<i class="fas fa-language fa-2x" aria-hidden="true"></i> Gestisti Traduzioni
		</a> --}}
        </div>



    </div>
</div>
