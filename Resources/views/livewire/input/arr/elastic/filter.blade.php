<div>
    <div class="w-100 mb-3">
        <h3 class="float-left">{{ $label ?? $name }}</h3>
        <button type="button" class="btn btn-primary float-right" wire:click="addArr()">+</button>
    </div>
    @foreach ($form_data[$name] ?? [] as $k => $v)
        @php
            $input_name=''.$name.'['.$k.']';
            $wire_name='form_data.'.$name.'.'.$k;
        @endphp
    <div class="input-group mb-3">
        <select class="form-select" name="{{ $input_name }}[criteria]" wire:model.lazy="{{ $wire_name }}.criteria">
            <option value="must">Must</option>
            <option value="mustNot">Must NOT</option>
            <option value="should">Should</option>
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

    <div class="input-group mb-3">
        
        {{--<x-input.date name="dateFrom" class="form-control" placeholder="dateFrom" :value="date('Y-m-d')"></x-input.date>
        <x-input.date name="dateTo" class="form-control" placeholder="dateTo" :value="date('Y-m-d')"></x-input.date>--}}
        <input class="form-control" type="date" id="dateFrom" name="dateFrom">
        <input class="form-control" type="date" id="dateTo" name="dateTo">
    </div>
    {{--
        https://bootstrap-datepicker.readthedocs.io/en/latest/markup.html#date-range
    <div class="input-group input-daterange">
        <input type="text" class="form-control" value="2012-04-05">
        <div class="input-group-addon">to</div>
        <input type="text" class="form-control" value="2012-04-19">
    </div>
    --}}
    


    <div class="form-group">
        <h4>Order</h4>
        <select class="form-control" name="orderBy">
            <option value="desc">DESC</option>
            <option value="asc">ASC</option>
        </select>
    </div>

</div>
@push('scripts')
    <script>
        Date.prototype.oneMonthAgo = (function() {
            var local = new Date(this);
            local.setMonth(this.getMonth() - 1);
            return local.toJSON().slice(0, 10);
        });
        document.getElementById('dateFrom').value = new Date().oneYearAgo();

        Date.prototype.toDateInputValue = (function() {
            var local = new Date(this);
            local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
            return local.toJSON().slice(0, 10);
        });
        document.getElementById('dateTo').value = new Date().toDateInputValue();
    </script>
@endpush
