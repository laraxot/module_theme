<div>
    <div class="w-100 mb-3">
        <h3 class="float-left">{{ $label ?? $name }}</h3>
        <button type="button" class="btn btn-primary float-right" wire:click="addArr()">+</button>
    </div>


    @foreach ($form_data[$name] ?? [] as $k => $v)
        @php
            $input_name = '' . $name . '[' . $k . ']';
            $wire_name = 'form_data.' . $name . '.' . $k;
        @endphp


        {{--
        <div class="dropdown d-inline-block">
            <button class="btn  dropdown-toggle" id="dropdownMenuButton" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">.*</button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="">
              <h6 class="dropdown-header fw-normal">Elastic Filter</h6>
                <span class="dropdown-item" href="#">Query diretta</span>
                <span class="dropdown-item" href="#">Deve contenere</span>
                <span class="dropdown-item" href="#">Non deve contenere</span>
                <span class="dropdown-item" href="#">Potrebbe conterere</span>
                
            </div>
        </div>
        --}}

        <select class="form-select" name="{{ $input_name }}[criteria]" wire:model.lazy="{{ $wire_name }}.criteria">
            <option>---</option>
            <option value="query_string_query">Query diretta:</option>
            <option value="must">Deve contenere:</option>
            <option value="mustNot">Non deve contenere:</option>
            <option value="should">Potrebbe conterere (or):</option>
            <option value="regexp">Inizia con:</option>
        </select>


        <input type="text" class="form-control" name="{{ $input_name }}[q]"
            wire:model.lazy="{{ $wire_name }}.q" />
        @if (isset($form_data[$name][$k]['criteria']) && $form_data[$name][$k]['criteria'] != 'query_string_query')
            <div class="input-group-text">
                <input class="form-check-input mt-0" type="checkbox" name="{{ $input_name }}[fuzzy]"
                    wire:model.lazy="{{ $wire_name }}.fuzzy"
                    aria-label="Checkbox for following text input" />&nbsp;Parola Simile
            </div>
        @endif

        <button type="button" class="btn btn-danger input-group-text" wire:click="subArr({{ $k }})"
            :wire:key="'sub-arr-'.$model_id"> -
        </button>
        <button type="button" class="btn btn-success float-right"
            onclick="addTilde('{{ $input_name }}[q]')">~</button>
    @endforeach
    {{--
    <div class="form-group">
        <h4></h4>
        <a href="#" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-html="true" title="<ul><li><strong>Virgolette:</strong> racchiudono una frase oppure due parole - %22lega nord%22 frase, lega nord due parole separate</li><li><strong>Parentesi:</strong> vedi espressioni matematiche - (new AND york) OR ((los AND angeles) OR California) OR %22U.S.A.%22</li><li><strong>AND:</strong> devono esserci entrambe le parole o frasi - %22leader della lega%22 AND Salvini frase E parola</li><li><strong>OR:</strong> deve esserci una delle due parole o frasi - %22leader della lega%22 OR Salvini frase O parola</li><li><strong>~N:</strong> ricerca di prossimità (NEAR) - %22governo carroccio%22~3 cerca governo e carroccio a distanza di 3 parole</li><li><strong>~N:</strong> ricerca di parole simili (FUZZY) - governo~2 cerca governo e parole simili (MASSIMO 2 lettere diverse. es. inverno)</li></ul>"><h5>Legenda Query Diretta</h5></a>
    </div>
    --}}
    {{--
    <div class="input-group mb-3">
        <x-input type="date.time.range" label="test" name="rows.{{ $model_id }}.date"></x-input>
    </div>

    <div class="form-group">
        <h4>Order</h4>
        <select class="form-control" name="sort" wire:model.lazy="form_data.rows.{{ $model_id }}.sort">
            <option value="desc">DESC</option>
            <option value="asc">ASC</option>
        </select>
    </div>
    --}}
    
</div>

@php
$request = request()->all();
$dateFrom = $request['dateFrom'] ?? '0';
$dateTo = $request['dateTo'] ?? '0';
$max_search_days = $profile->getProfile()->max_search_days ?? 365;

//dddx([$dateFrom,$dateTo,$max_search_days]);
//dddx($dateFrom==="0");

@endphp

{{-- @push('scripts')
    <script>
        
        Date.prototype.daysAgo = (function(max_search_days) {
            var local = new Date(this);
            local.setDate(this.getDate() - max_search_days);
            return local.toJSON().slice(0, 10);
        });

        if({{$dateFrom}}=="0"){
            document.getElementById('dateFrom').value = new Date().daysAgo({{$max_search_days}});
        }else{
            document.getElementById('dateFrom').value = "{{$dateFrom}}"
        }

        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });
        if({{$dateTo}}=="0"){
            document.getElementById('dateTo').value = new Date().toDateInputValue();
        }else{
            document.getElementById('dateTo').value = "{{$dateTo}}";
        }
        
    </script>
@endpush
--}}
@push('scripts')
    <script>
        function addTilde(element) {
            const el = $('[name="' + element + '"]').not('#search_search')
            $(el).val($(el).val() + '~')
        }
    </script>
@endpush
