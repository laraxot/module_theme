<template>
	<div class="modal fade" id="vueModal" ref="vuemodal" tabindex="-1" role="dialog" aria-labelledby="vueModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div v-if="loading">
					<div class="modal-header">
						<h5  id="vueModalLabel">{{ title }}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="d-flex justify-content-center">
							<div class="spinner-border" role="status" >
								<span class="sr-only">Loading...</span>
							</div>
						</div>
					</div>
				</div>
				<div v-else>
					<div class="modal-header">
						<h5 class="modal-title" id="vueModalLabel">{{ title }}</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
                        <div class="alert alert-danger" role="alert" v-if="hasError">
                            {{ error }}
                        </div>
						<span v-html="body" v-on:click.capture="handleClick"></span>
                        <!--
                        <div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Send message</button>

					    </div>
                        -->
                    </div>

				</div>
			</div>
		</div>
	</div>
</template>
<script>
var formSerialize = require('form-serialize');
export default {
	name: 'bs-modal',
	props: ['message'],
	data() {
		return {
			body: this.message,
			loading: true,
			title: 'Loading..',
			hasError: false,
			error: null,

		}
	},
	created() {

	},
	methods: {
		close: function () {
			this.$emit('close');
		},
		submit(e) {
			e.preventDefault();
			this.$root.$emit('form-sending');
			let myform = e.target.form;
			let data = formSerialize(myform, {
				hash: false,
				empty: true
			});
			/*
			data += '&' + e.target.name + '='
			        + encodeURIComponent(e.target.value);

			console.log('method: '+ myform.method);
			console.log('action: ' + myform.action);
			console.log(data);
			*/
            this.loading = true;
            //headers: 'X-Requested-With': 'XMLHttpRequest'
			axios({
				method: myform.method,
				url: myform.action,
				data: data
			}).then(
				response => {
					this.loading = false;
					if (response.data.redirect) {
                        //handleFormRedirect(response.data.redirect);
                        //this.$router.push('Home')
                        //https://stackoverflow.com/questions/51281157/vue2-how-to-redirect-to-another-page-using-routes
                        window.location.href = response.data.redirect;
					} else {
                        console.log(response);
                        /*
                        this.title = response.data.title;
                        this.content = response.data.content;
                        */
					}
				}
			).catch(
				err => {
					//console.log(err.response);
					this.loading = false;
					this.hasError = true;
					this.error = err.response.error;
					//this.body=error;
				}
			);
		},

		handleClick(e) {
			if (e.target.tagName == 'INPUT' && e.target.type == 'submit') {
				this.submit(e);
			}
			if (e.target.tagName == 'BUTTON' && e.target.type == 'submit') {
				this.submit(e);
			}
			e.preventDefault();
		}

    },
	mounted() {
        //var $emit=this.$emit;
        //this.$router.go('http://www.google.com');
		var obj = this;
		this.modal = $(this.$refs.vuemodal);
		this.modal.on("show.bs.modal", function (event) {
			var button = $(event.relatedTarget); // Button that triggered the modal
			obj.title = button.data('title'); // Extract info from data-* attributes
			obj.href = button.data('href');
			obj.body = '';
			var modal = $(this);

			if (obj.href == undefined) {
				obj.body = 'attributes data-href missing in button';
			}
			axios.get(obj.href)
				.then(
					res => {
						console.log(res);
						obj.loading = false;
						obj.body = res.data.html;
					}
				).catch(
					err => {
						console.log(err);
						this.hasError = true;
						obj.body = err;
					}
				);

		});
		document.addEventListener("keydown", (e) => {
			if (this.show && e.keyCode == 27) {
				this.close();
			}
		});
	}
};
/*
http://junerockwell.com/how-to-make-simple-basic-modal-using-bootstrap-css-vuejs-2/
https://github.com/hultberg/vue-bootstrap-modal/blob/master/src/modal.vue

https://forum.vuejs.org/t/the-right-way-to-do-2-way-props/16487/4
<textarea v-model="interface"></textarea>
computed:{
 interface:{
   get(){
     return this.value
   },
   set(val){
     this.$emit('input', val)
   }
 }
}



*/
</script>
<style>
</style>
