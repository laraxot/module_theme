<div>
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @foreach ($fields as $field)
                {{-- <x-forms.inputs.group :field="(object)$field" /> --}}
                <x-input.group :field="(object)$field" />
            @endforeach

        </div>
        <div class="row">
            <div class="col-md offset-md-2">
                <x-forms.button wire:click="saveAndStay">{{ __('Save') }}</x-forms.button>
                {{-- <button class="btn btn-primary" wire:click="saveAndStay">{{ __('Save') }}</button> --}}
                {{-- <button class="btn btn-primary" wire:click="saveAndGoBack">{{ __('Save & Go Back') }}</button> --}}
            </div>
            @if (session()->has('message'))
                {{-- <x-alert type='success'>x {{ session('message') }}</x-alert> --}}
                <div class="alert alert-success" style="margin-top:30px;">x
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>
</div>
