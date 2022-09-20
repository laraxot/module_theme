<div>
    <div class="w-100 mb-3">
        <h3 class="float-left">{{ $label ?? $name }}</h3>
        <button type="button" class="btn btn-primary float-right" wire:click="addArr()">+</button>
    </div>
   
    @php
        //dddx($form_data);
    @endphp
    @foreach ($form_data[$name] ?? [] as $k => $v)
        @php
            $input_name=''.$name.'['.$k.']';
            $wire_name='form_data.'.$name.'.'.$k;
        @endphp


    <div class="input-group mb-3">
        <select class="form-select" name="{{ $input_name }}[criteria]" wire:model.lazy="{{ $wire_name }}.criteria">
            <option value="query_string_query">Query diretta:</option>
            <option value="must">Deve contenere:</option>
            <option value="mustNot">Non deve contenere:</option>
            <option value="should">Potrebbe conterere (or):</option>
            <option value="regexp">Inizia con:</option>
        </select>

        
        <input type="text" class="form-control" name="{{ $input_name }}[q]" wire:model.lazy="{{ $wire_name }}.q" />

        
        <div class="input-group-text">
            <input class="form-check-input mt-0" type="checkbox" name="{{ $input_name }}[fuzzy]" 
            wire:model.lazy="{{ $wire_name }}.fuzzy"
            aria-label="Checkbox for following text input" />
        </div>

        <button type="button" class="btn btn-danger input-group-text" wire:click="subArr({{ $k }})"
            :wire:key="'sub-arr-'.$model_id"> -
        </button>
        
    </div>
    @endforeach

    
    <div class="form-group">
        <h4>Command Legend</h4>
        <ul>
            <li>Virgolette: racchiudono una frase oppure due parole - "lega nord" frase, lega nord due parole separate</li>
            <li>Parentesi: vedi espressioni matematiche - (new AND york) OR ((los AND angeles) OR California) OR "U.S.A."</li>
            <li>AND: devono esserci entrambe le parole o frasi - "leader della lega" AND Salvini frase E parola</li>
            <li>OR: deve esserci una delle due parole o frasi - "leader della lega" OR Salvini frase O parola</li>
            <li>~NUM: ricerca di prossimità (NEAR) - "governo carroccio"~3 cerca governo e carroccio a distanza di 3 parole</li>
        </ul>
       
    </div>

    <div class="input-group mb-3">
        <input class="form-control" type="date" id="dateFrom" name="dateFrom">
        <input class="form-control" type="date" id="dateTo" name="dateTo">
    </div>

    <div class="form-group">
        <h4>Order</h4>
        <select class="form-control" name="orderBy">
            <option value="desc">DESC</option>
            <option value="asc">ASC</option>
        </select>
    </div>

    

</div>

@php
$request=request()->all();
$dateFrom=$request['dateFrom'] ?? "0";
$dateTo=$request['dateTo'] ?? "0";
$max_search_days= $profile->getProfile()->max_search_days ?? 365;

//dddx([$dateFrom,$dateTo,$max_search_days]);
//dddx($dateFrom==="0");
@endphp

@push('scripts')
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
