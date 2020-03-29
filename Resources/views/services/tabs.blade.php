<section id="tabs-section">
	<div class="card custom-card">
	    <ul class="nav nav-tabs  tablist" role="tablist">
	    @foreach($tabs as $k=>$v)
	        <li class="nav-item" role="presentation">
	            <a href="#{{ $v['name'] }}" aria-controls="{{ $v['name'] }}" class="nav-link @if($k==0) active @endif" role="tab" data-toggle="tab">
	            {{-- <i class="{{ $v['icon'] }}"></i> --}} {{-- $v['name'] --}} {{-- __(str_replace('.','.',$tabs_view).'.'.$v['name']) --}}
	            {!! __($tabs_view.'.'.$v['name'].'.title') !!}
	            </a>
	        </li>
	    @endforeach
	    </ul>
	    <!-- Tab panes -->
	    <div class="tab-content row">
	    @foreach($tabs as $k=>$v)
	        <div role="tabpanel" class="tab-pane fade @if($k==0) in active @endif " id="{{ $v['name'] }}">
	        @include($tabs_view.'.'.$v['view'])
	        </div>
	    @endforeach 
	    </div>
	</div>
</section>