<div>
	@php
	Theme::add('https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js');
	@endphp
	<div wire:sortable="updateGroupOrder" wire:sortable-group="updateChildOrder" style="display: flex">
		@foreach ($shops as $shop)
		<div wire:key="shop-{{ $shop['id'] }}" wire:sortable.item="shop-{{ $shop['id'] }}">
			<div style="display: flex">
				<h4 wire:sortable.handle>{{ $shop['category_name'] }}</h4>
			</div>
			<ul wire:sortable-group.item-group="shop-{{ $shop['id'] }}"   >
				@foreach ($shop['children'] as $child)
				<li wire:key="child-{{ $child['id'] }}" wire:sortable-group.item="child-{{ $child['id'] }}">
					{{ $child['category_name'] }}
					<ul wire:sortable-group.item-group="child-{{ $child['id'] }}" >
						@foreach ($child['children'] as $child0)
						<li wire:key="child0-{{ $child0['id'] }}" wire:sortable-group.item="child0-{{ $child0['id'] }}">
							{{ $child0['category_name'] }}
						</li>
						@endforeach
					</ul>
				</li>
				@endforeach
			</ul>
		</div>
		@endforeach
	</div>
</div>
