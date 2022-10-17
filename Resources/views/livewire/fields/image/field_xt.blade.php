@component($field->input_component,get_defined_vars())
    @slot('label')
    <label class="col-xl-3 col-lg-3 col-form-label text-right">Example Label</label>
    @endslot
	@slot('input')
    <div class="col-lg-9 col-xl-6" wire:ignore>
<<<<<<< HEAD

=======
        
>>>>>>> ede0df7 (first)
        <div class="image-input image-input-empty image-input-outline" style="background-image: url({{-- $form_data[$field->name] --}})">
            <div class="image-input-wrapper"></div>
            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file"  accept=".png, .jpg, .jpeg" class="xtimage"/>

            </label>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>

        <span class="form-text text-muted">
            <input
            id="{{ $field->key }}"
            type="text"
            class="form-control @error($field->key) is-invalid @enderror"
            autocomplete="{{ $field->autocomplete }}"
            placeholder="{{ $field->placeholder }}"
            wire:model="{{ $field->key }}">

            @include('theme::livewire.fields.error-help')
        </span>

    </div>
    @endslot
@endcomponent
    {{--
    </div>
    --}}

@php

@endphp
@push('scripts')
<script>
document.addEventListener('livewire:load', function () {
    function readURL(input,img,input_text) {

        if (input.files && input.files[0]) {
            var file=input.files[0];
            var reader = new FileReader();

            reader.onload = async function(e) {
                data = await e.target.result;
                img.css("background-image",'url(' + data +')');
                input_text.val('/uploads/gallery/'+ file.name);
                var model=input_text.attr('wire:model');
                @this.carica(model,file.name,file.type,data);
            }

            reader.readAsDataURL(file); // convert to base64 string
        }
    }
    $(".xtimage").change(function() {
        var img=$(this).parent().parent();
        var input_text=$(this).parent().parent().parent().find('input[type=text]');
        file=readURL(this,img,input_text);
    });
});
</script>
@endpush
