@php
//dddx($_panel->row);
//dddx(get_defined_vars());
@endphp
<div class="form-group col-sm-12">
    <livewire:input.status.select :model="$_panel->row" :options="$_panel->getStatusesList()" />
</div>
