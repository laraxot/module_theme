<x-input.group type="text" placeholder="Azienda" label="Azienda" name="business_name" required="required">
</x-input.group>
<x-input.group type="text" placeholder="Telefono" label="Telefono" name="phone" required="required"></x-input.group>
<x-input.group type="text" placeholder="Email" label="Email" name="email" required="required"></x-input.group>


<div class="col-sm-12 mt-3">
    <x-input.group type="text" placeholder="Azienda" label="Azienda *" name="business_name"></x-input.group>
</div>

<div class="col-sm-12 mt-3">
    <x-input.group type="text" placeholder="Telefono" label="Telefono *" name="phone"></x-input.group>
</div>

<div class="col-sm-12 mt-3">
    <x-input.group type="text" placeholder="Email" label="Email *" name="email"></x-input.group>
</div>

<div class="col-sm-12 mt-4 ml-4">
    <div class="form-group">

        <x-input type="checkbox" name="privacy" placeholder=" ">
        </x-input>

        <label class='control-label'> * Accetto le <a href="/it/privacy" target="_blank">condizioni sulla Privacy</a>
            di
            cybersec00.com</label>


    </div>
</div>


<div class="modal-footer">
    {{-- <button class="btn btn-secondary" type="button" wire:click.prevent="doClose()">Cancel</button> --}}

    {{-- @this sono le variabili di livewire informato javascript. ad esempio @this.form_data sono i dati del form --}}
    <button class="btn btn-primary" type="button"
        wire:click.prevent="$emitTo('theme::modal.form.phonecall', 'doSend',@this.form_data);">{{ $popup_button }}</button>
</div>

{{-- <x-input.checkbox name="privacy"></x-input.checkbox>

<div class="col-sm-12">
    <x-input.group type="submit" name="send" value="Invia"></x-input.group>
</div> --}}
