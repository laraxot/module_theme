<template>
    <div>
        <div :id="id" ref="slider" class=""></div>
        <span>
        </span>
    </div>
</template>

<script>
import noUiSlider from "nouislider";
import $ from "jquery";
import _ from "lodash";

export default {
    props: ["id"],
    data() {
        return {
            slider: null,
            options: {
                controls: true,
            },
        };
    },
    mounted() {
        
        const range = this.$refs['slider'];
        //console.log('slider');
        //console.log(this.options);
        this.slider = noUiSlider.create(range, {
            start: [0, 0],
            connect: true,
            tooltips: true,
            range: {
                'min': 0,
                'max': 100
            }

        });
        

        document.addEventListener('livewire:load',  event => {
            
            //console.log(Livewire);
            this.slider.on('change', function(values, handle) {
                //@this.updateValues(values);
                //console.log(values);
                Livewire.emit('updateSliderValues',values);
            });

            Livewire.on('setSliderMinMax',(from,to) =>{
                //console.log('setSliderMinMax');
                //console.log(from+ ': '+to);
                this.slider.updateOptions({
                    range: {
                        'min': from,
                        'max': to
                    }
                });
            });
            /*
            window.addEventListener('setSliderMinMax', event => {
                console.log('aaaa');
                range.noUiSlider.updateOptions({
                    range: {
                        'min': event.detail.min,
                        'max': event.detail.max
                    }
                });
            });

            window.addEventListener('setSliderValues', event => {
                console.log('bbb');
                range.noUiSlider.updateOptions({
                    start: event.detail.values,
                });
            });
            */
        });
        


    }
};
</script>

<style>
   @import "nouislider/dist/nouislider.css";
</style>
