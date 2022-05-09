@php
    Theme::add('https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css');
    Theme::add('https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js');
@endphp
<div>
     @if (session()->has('message'))
        <div class="alert alert-success" style="margin-top:30px;">x
          {{ session('message') }}
        </div>
    @endif

    <div id="jstree" wire:ignore>
        <div class="spinner-border text-success" role="status">
  <span class="sr-only">Loading...</span>
</div>
    </div>
</div>
@push('scripts')
    <script>
         //document.addEventListener('livewire:load', function () {
        //@this.test();
        // });

        $(function () {
            var check=[];
            $("#jstree").jstree({
                "core" : {
                    'data' : {!! json_encode($tree_nodes_jstree) !!},
                    'check_callback' : mycheck,
                },
                "types":{!! json_encode($tree_types) !!},
                "plugins" : [ "dnd", "state", "types" ]
            }).bind("dnd_stop.vakata", function(e, data) {
                alert('preso');
            });
            $(document).on('dnd_stop.vakata', function (e, data) {
                //alert('preso');
                /*
                ref = $('#jstree').jstree(true);
                node=ref.get_node(data.element);
                parent = node.parent;
                console.log(node);
                console.log( $('#jstree').data('node'));
                console.log( $('#jstree').data('node_parent'));
                console.log( $('#jstree').data('node_position'));
                */

                var r = confirm("Press a button!");
                if (!r == true) {
                  location.reload();
                } 
                var operation = 'dnd_stop.vakata';
                var node= $('#jstree').data('node');
                var node_parent= $('#jstree').data('node_parent');
                var node_position= $('#jstree').data('node_position');
                @this.save(node, node_parent, node_position);
            });

            function mycheck(operation, node, node_parent, node_position) {
                $('#jstree').data('node',node);
                $('#jstree').data('node_parent',node_parent);
                $('#jstree').data('node_position',node_position);
                
                check['area-menu']=true;
                check['menu-menu']=true;
                check['menu-page']=true;
                check['photo_cat-photo'] = true;
                check_key=node_parent.type+'-'+node.type;
                res=check[check_key];


                if(res==undefined){
                    check[check_key]='loading';
                    @this.checkCallback(operation, node, node_parent, node_position)
                      .then(
                      function(res){
                        check[check_key]=res;
                      }
                      );
                    return false;
                }
                if(res=='loading'){
                    return false;
                }
                
                console.log(check_key);
                console.log(res);
                return res;
            }

        });
        //*/
    </script>
@endpush


{{-- esempio per inviare il jason
https://stackoverflow.com/questions/40900548/how-do-i-save-a-new-jstree-after-drag-and-drop


evento change del json?
https://www.jstree.com/docs/events/

--}}
