<div class="nouislider-container">
    <div class="nouislider"></div>
    <input type="text" class="nouislider-input" name="boh" value="666">
</div>
@push('styles')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.css"
        integrity="sha512-MKxcSu/LDtbIYHBNAWUQwfB3iVoG9xeMCm32QV5hZ/9lFaQZJVaXfz9aFa0IZExWzCpm7OWvp9zq9gVip/nLMg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endpush
@push('scripts')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.5.0/nouislider.js"
        integrity="sha512-7i2V4phHspcYYpLujbQU0Ur1NjN6h0oWic1YVo8V1gLtBzOziltT3XX/5XaAmhbvtx3QjyANL/MIyuTpXh/Ndw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
    <script>
        $(() => {
            var sliders = $('.nouislider-container .nouislider');
            for (var i = 0; i < sliders.length; i++) {
                var slider = noUiSlider.create(sliders[i], {
                    start: [20, 80],
                    connect: true,
                    tooltips: true,
                    range: {
                        'min': 0,
                        'max': 100
                    }
                });
                //$(sliders[i]).data('slider', slider);
                slider.on('change', function(values, handle) {
                    $val = JSON.stringify(values);
                    $(event.target).closest('.nouislider-container').find('.nouislider-input').val($val);
                });
            }

        });
    </script>

@endpush

{{-- https://stackoverflow.com/questions/33689525/nouislider-update-input-value-multiple-sliders --}}
