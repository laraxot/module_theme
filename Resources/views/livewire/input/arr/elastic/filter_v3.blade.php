<div>
	<h3>Criteri di ricerca <a href="#" wire:click="addArr()" class="btn btn-circle btn-primary btn-sm"><i
		class="uil uil-plus"></i></a>
	</h3>
	@foreach ($form_data[$name] ?? [] as $k => $v)
	@php
	$input_name = $name . '[' . $k . ']';
	$wire_name = 'form_data.' . $name . '.' . $k;
	@endphp
	<div class="row">
		<div class="form-select-wrapper mb-4 col-10">
			<div class="input-group">
				<select class="form-select" name="{{ $input_name }}[criteria]"
					wire:model.lazy="{{ $wire_name }}.criteria">
					<option value="query_string_query" selected>Query diretta:</option>
					<option value="must">Deve contenere:</option>
					<option value="mustNot">Non deve contenere:</option>
					<option value="should">Potrebbe conterere (or):</option>
					<option value="regexp">Inizia con:</option>
				</select>
			</div>
		</div>
		<div class="input-group-append col-2 my-1">
			<a href="#" wire:click="subArr({{ $k }})" class="btn btn-circle btn-primary btn-sm">
			<i class="uil uil-minus"></i>
			</a>
			<a href="#" onclick="addTilde('{{ $input_name }}[q]')" class="btn btn-circle btn-primary btn-sm">
			<i>~</i>
			</a>
		</div>
	</div>
	<div class=" mb-4">
		<input type="text" id="textInputInserisci" placeholder="Text Input" class="form-control" name="{{ $input_name }}[q]"
			wire:model.lazy="{{ $wire_name }}.q" />
		<label for="textInputInserisci">Ricerca parola</label>
		@if (isset($form_data[$name][$k]['criteria']) && $form_data[$name][$k]['criteria'] != 'query_string_query')
		<div class="input-group-text my-2">
			<input class="form-check-input" type="checkbox" name="{{ $input_name }}[fuzzy]"
				wire:model.lazy="{{ $wire_name }}.fuzzy"
				aria-label="Checkbox for following text input" />&nbsp;Parola Simile
		</div>
		@endif
	</div>
	@endforeach
	<div class="row">
		<div class="form-select-wrapper mb-4 col-md-4">
			<x-input.group type="select" class="form-select" name="order_by" :options="['desc' => 'Discendente', 'asc' => 'Ascendente']" label_class="h3" id="order_by" />
		</div>
		<div class="form-select-wrapper mb-4 col-md-4">
			<x-input.group type="date.datetime.range" class="form-select" name="calendar" id="calendar" label_class="h3" />
		</div>
		<div class="form-select-wrapper mb-4 col-md-4">
			<x-input.group type="select" class="form-select" name="type" :options="$_theme->getMediaTypeList()" label_class="h3" id="media_type" />
		</div>
	</div>
</div>
@push('scripts')
<script>
	function addTilde(element) {
	    const el = $('[name="' + element + '"]').not('#search_search')
	    $(el).val($(el).val() + '~')
	}
</script>
@endpush