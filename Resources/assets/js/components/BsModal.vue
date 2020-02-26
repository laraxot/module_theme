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
						<span v-html="body"></span>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Send message</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script>
	export default {
	       name: 'bs-modal',
	    props: ['message'],
	    data() {
	        return {
	            body: this.message,
	               loading:true,
	               title:'Loading..',
	        }
	    },
	    created() {

	    },
	    methods: {
	           /*
	        onShowModal(event){
	               console.log(event);
	               var button = $(event.relatedTarget) // Button that triggered the modal
	               var title = button.data('title') // Extract info from data-* attributes
	               console.log(title);
	               // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
	               // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
	               var modal = $(this)
	               modal.find('.modal-title').text(title);
	               //modal.find('.modal-body input').val(recipient)
	           },
	           */
	            ajaxLink:function(data,modal){
                    this.body=data;
                    var myform=this.modal.find('form');
                    console.log('my form:');
                    console.log(myform);




                    modal.find('form').submit(function(e){
                        console.log('submit');
                        this.loading=true;
                        e.preventDefault();
                        modal.find('.form-msg').html(loading);
                        var old_data=modal.find('.modal-body').html();
                        modal.find('.modal-body').html(loading);
                        var myform = $(this);
                        var querystring = myform.serialize();
                        var actionurl = e.currentTarget.action;
                        $.ajax({
                            url: actionurl,
                            type: 'post',
                            dataType: 'json',
                            data: querystring
                        }).done(function( data ) {
                            modal.find('.form-msg').html('<div class="alert alert-success"><strong>Success </strong>'+data.msg+'</div>');
                            modal.find('.modal-body').html(old_data);
                            modal.data('reload',1);
                        }).fail(function(response){
                            console.log(response);
                            var err='';
                            var errors=response.responseJSON.errors;
                            for(i in errors){
                                err=err+'<div class="alert alert-danger"><strong>Error! </strong>'+i+' '+errors[i]+'</div>';
                            }
                            modal.find('.form-msg').html(err);
                        });

                        //alert('preso !');
                    });
                },
	           close: function () {
	               this.$emit('close');
	           }

	       },
	       mounted(){
	           //var $emit=this.$emit;
               var obj=this;
               this.modal=$(this.$refs.vuemodal);
	           this.modal.on("show.bs.modal",  function (event) {
	               var button = $(event.relatedTarget); // Button that triggered the modal
	               obj.title = button.data('title'); // Extract info from data-* attributes
	               obj.href= button.data('href');
                   obj.body='';
                   var modal = $(this);

	               if(obj.href==undefined){
	                   obj.body='attributes data-href missing in button';
	               }
	               axios.get(obj.href)
	                   .then(function(res){
	                       console.log(res);
	                       obj.loading=false;
                           //obj.body=res.data;
                           obj.ajaxLink(res.data,modal);
	                   }).catch(function (error) {
	                       console.log(error);
	               });
	               //var modal = $(this)
	               //console.log(title);
	               //$emit('title', title);
	               //modal.find('.modal-title').text(title);
	               //obj.title=title;
	               //this.title=title;
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
<style></style>
