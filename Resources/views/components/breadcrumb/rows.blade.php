<div class="cmp-breadcrumbs {{$class}}" role="navigation">
	<nav class="breadcrumb-container">
		<ol class="breadcrumb p-0" data-element="breadcrumb">
			{{--         
			{{#if link1}}
			<li class="breadcrumb-item"><a href="#">{{link1}}</a><span class="separator">/</span></li>
			{{/if}}
			{{#if link2}}
			<li class="breadcrumb-item"><a href="#">{{link2}}</a></li>
			{{/if}}
			{{#if link3}}
			<li class="breadcrumb-item active" aria-current="page"><span class="separator">/</span>{{link3}}</li>
			{{/if}} --}}
			@foreach($rows as $item)
			    <li class="breadcrumb-item">
                    <a href="#">{{ $item }}</a>
                    <span class="separator">/</span>
                </li>
			@endforeach
		</ol>
	</nav>
</div>