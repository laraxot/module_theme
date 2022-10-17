<div class="nouislider-container">
    <div class="nouislider" id="{{ $attrs['id'] }}" wire:ignore ></div>
    {{--
    {{ print_r($values,true) }}
    --}}
</div>
@push('styles')
<<<<<<< HEAD

@endpush
@push('scripts')

=======
   
@endpush
@push('scripts')
   
>>>>>>> ede0df7 (first)
    <script>
        $(() => {
            var range = document.getElementById('{{ $attrs['id'] }}');
            var slider = noUiSlider.create(range, {
                start: [0, 0],
                connect: true,
                tooltips: true,
                range: {
                    'min': 0,
                    'max': 100
                }
            });
            //$(sliders[i]).data('slider', slider);
            slider.on('change', function(values, handle) {
                @this.updateValues(values);
            });
<<<<<<< HEAD

=======
        
>>>>>>> ede0df7 (first)
            window.addEventListener('setSliderMinMax', event => {
                range.noUiSlider.updateOptions({
                    range: {
                        'min': event.detail.min,
                        'max': event.detail.max
                    }
                });
            });

            window.addEventListener('setSliderValues', event => {
                range.noUiSlider.updateOptions({
                    start: event.detail.values,
                });
            });

        });
    </script>

@endpush

{{-- https://stackoverflow.com/questions/33689525/nouislider-update-input-value-multiple-sliders --}}
