<template>
	<div class="text-center mt-12">
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        <h4>{{ this.title }}</h4>
=======
        <h3>{{ this.title }}</h3>
>>>>>>> b6141c95 (first)
=======
        <h3>{{ this.title }}</h3>
>>>>>>> 6aa89a58 (first)
=======
        <h4>{{ this.title }}</h4>
>>>>>>> ede0df75 (first)
=======
        <h4>{{ this.title }}</h4>
>>>>>>> 7f97b271 (up)
=======
        <h3>{{ this.title }}</h3>
>>>>>>> b6141c95 (first)
=======
        <h3>{{ this.title }}</h3>
>>>>>>> 6aa89a58 (first)
        <v-rating
            v-model="rating"
            background-color="orange lighten-3"
            color="purple"
            empty-icon="far fa-star fa-2x"
            full-icon="fas fa-star fa-2x"
            half-icon="fas fa-star-half-alt fa-2x"
            half-increments
            hover
            @click.native="ratingSave()"

            ></v-rating>

    <span class="font-weight-bold">
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
        <input type="hidden" :name="name" :value="rating">
=======
        <input type="hidden" :value="rating" :name="name">
>>>>>>> b6141c95 (first)
=======
        <input type="hidden" :value="rating" :name="name">
>>>>>>> 6aa89a58 (first)
=======
        <input type="hidden" :name="name" :value="rating">
>>>>>>> ede0df75 (first)
=======
        <input type="hidden" :name="name" :value="rating">
>>>>>>> 7f97b271 (up)
=======
        <input type="hidden" :value="rating" :name="name">
>>>>>>> b6141c95 (first)
=======
        <input type="hidden" :value="rating" :name="name">
>>>>>>> 6aa89a58 (first)
      </span>
    </div>
</template>
<script>
	export default {
	    name: 'rating-one',
	    props: ['name','value','title'],
	    data: () => ({
            rating:null,
        }),
        computed: {
            rating1(){
                return parseFloat(this.value);
            }
        },
        mounted(){
            this.rating=parseFloat(this.value);
        },
        methods: {
            ratingSave: function () {
               //alert('preso'+ this.rating);
            },
        }

	   }
</script>
