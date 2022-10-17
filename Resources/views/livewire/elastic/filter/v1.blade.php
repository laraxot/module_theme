<div>
    <livewire:input.arr type="text_with_checkbox" label="Frase precisa: " name="must" :value="$must"
        :modelId="$model_id" />
    <livewire:input.arr type="text_with_checkbox" label="Parole da escludere (singolarmente): " name="must_not"
        :value="$must_not" :modelId="$model_id" />
    <livewire:input.arr type="text" label="Parola che inizia per: " name="regexp" :value="$regexp" :modelId="$model_id" />
    {{-- <livewire:input.arr type="text_with_checkbox" label="or" name="should" :value="$should" :modelId="$model_id" /> --}}
    <livewire:input.arr type="text" label="Parola simile a: " name="fuzzy" :value="$fuzzy" :modelId="$model_id" />
    <div class="form-group">
        <h4>From</h4>
        <input class="form-control" type="date" id="dateFrom" name="dateFrom">
    </div>
    <div class="form-group">
        <h4>To</h4>
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
@push('scripts')
    <script>
        Date.prototype.oneYearAgo = (function() {
            var local = new Date(this);
            local.setFullYear(this.getFullYear() - 1);
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
