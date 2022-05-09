@component($field->input_component,get_defined_vars())
    @slot('label')
    <label class="col-xl-3 col-lg-3 col-form-label text-right">Example Label</label>
    @endslot
	@slot('input')
    <div class="col-lg-9 col-xl-6">
        <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{ $form_data[$field->name] }})">
            <div class="image-input-wrapper"></div>
            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change">
                <i class="fa fa-pen icon-sm text-muted"></i>
                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                <input type="hidden" name="profile_avatar_remove" />
            </label>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove">
                <i class="ki ki-bold-close icon-xs text-muted"></i>
            </span>
        </div>
        {{--
        <span class="form-text text-muted">Default empty input with blank image</span>
        --}}
    </div>
    @endslot
@endcomponent
    {{--
    </div>
    --}}

@php
    /*
        kt perche' si chiama KTImageInput custom js di metronic
    */
    $comp_ns=implode('.',array_slice(explode('.',$view),0,-1));
    Theme::add($comp_ns.'/js/image-input.js');
@endphp
