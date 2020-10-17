<li class="menu-item  menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
        {{--  
		<a href="#" class="menu-link menu-toggle">
        --}}
        <span class="menu-link menu-toggle">
			<span class="svg-icon menu-icon">
				<!--begin::Svg Icon | path:media/svg/icons/Design/Bucket.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<rect x="0" y="0" width="24" height="24"></rect>
						<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z" fill="#000000" fill-rule="nonzero" transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000) "></path>
						<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z" fill="#000000" opacity="0.3"></path>
					</g>
				</svg>
				<!--end::Svg Icon-->
			</span>
            <span class="menu-text">{{ $title }}</span>
            <span wire:click="clickArea({{ $id }})"><i class="menu-arrow"></i></span>
        {{--  
        </a>
        --}}
    </span>
        
		<div class="menu-submenu ">
			<span class="menu-arrow"></span>
			<ul class="menu-subnav">
                 @if(isset($area->sons))
                    @foreach($area->sons as $son)
                        <li class="menu-item " aria-haspopup="true"><a href="http://fipitaly.local/admin/ew/it/area" class="menu-link ">
                            <i class="menu-bullet menu-bullet-dot"><span></span></i><span class="menu-text">area</span></a>
                        </li>
                    @endforeach
                @endif
				
			</ul>
        </div>
        
	</li>