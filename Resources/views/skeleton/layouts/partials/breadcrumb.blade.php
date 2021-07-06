<div class="breadcrumb">
	<div class="container">
		<ul itemscope itemtype="http://schema.org/BreadcrumbList">
			{{-- 
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="{{ asset('/') }}">
					<span itemprop="name">Home</span>
				</a>
				 <meta itemprop="position" content="2" />
			</li>
			--}}{{-- da valutare se lingua va bene --}}
			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="{{ asset(App::getLocale()) }}">
					<span itemprop="name">Home</span>
				</a>
				 <meta itemprop="position" content="1" />
			</li>
			@foreach(array_values($params) as $k=>$v)
        		@if(isset($v->title))
        			<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
						<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="{{ $v->url }}">
							<span itemprop="name">{{ ($v->title!=''?$v->title:$v->guid) }}</span>
						</a>
				 		<meta itemprop="position" content="{{ $k+2 }}" />
					</li>
        		@endif
        	@endforeach
        	@php
        		$routename=Route::currentRouteName();
        		$route_arr=explode('.',$routename);
        		$last_route=last($route_arr);
        	@endphp
        	@if($last_route!='index' && $last_route!='show')
        		<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
					<a itemscope itemtype="http://schema.org/Thing" itemprop="item" href="{{ url()->current() }}">
						<span itemprop="name">@lang('pub_theme::txt.'.$last_route)</span>
					</a>
			 		<meta itemprop="position" content="{{ $k+1 }}" />
				</li>
        	@endif
		</ul>
	</div>
</div>
