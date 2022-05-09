{{ Theme::add('/theme/bc/bootstrap/dist/css/bootstrap.min.css') }}
{{ Theme::add('/theme/bc/gridstack/dist/gridstack.css') }}

{{ Theme::add('/theme/bc/jquery/dist/jquery.min.js') }}
{{ Theme::add('/theme/bc/jquery-ui/jquery-ui.min.js') }}

{{ Theme::add('/theme/bc/jqueryui-touch-punch/jquery.ui.touch-punch.min.js') }}

{{ Theme::add('/theme/bc/bootstrap/dist/js/bootstrap.min.js') }}

{{ Theme::add('/theme/bc/lodash/dist/lodash.min.js') }}

{{ Theme::add('/theme/bc/jquery.easing/js/jquery.easing.min.js') }}

{{ Theme::add('/theme/bc/gridstack/dist/gridstack.js') }}
{{ Theme::add('/theme/bc/gridstack/dist/gridstack.jQueryUI.js') }} 


@push('styles')
    <style type="text/css">
        .grid-stack {
            background: lightgoldenrodyellow;
        }

        .grid-stack-item-content {
            color: #2c3e50;
            text-align: center;
            background-color: #18bc9c;
        }

       
    </style>
@endpush

<hr/>
    <div class="container-fluid">
        <h1>{{ $name }}</h1>

        <div class="btn-group">
        	<a class="btn btn-default" id="add-new-widget" href="#">Add Widget</a>
            <a class="btn btn-default" id="save-grid" href="#">Save Grid</a>
            <a class="btn btn-default" id="load-grid" href="#">Load Grid</a>
            <a class="btn btn-default" id="clear-grid" href="#">Clear Grid</a>
        </div>

        <br/>

        <div class="grid-stack">
        </div>

        <hr/>
        <div style="display: block">
            <textarea name="post_content_serialized" readonly="readonly" id="saved-data" cols="100" rows="20" >{{ $value }}</textarea>
        </div>
    </div>

 {{-- questo qua sotto e' il pezzo che vado a riclonare  --}}
<div id="griditem" style="display:none">
<div><div class="grid-stack-item-content" >
	<div class="btn-group" >
			<a class="btn btn-default" href="#" data-toggle="modal" data-target="#myModal">
				<i class="fa fa-pencil"></i>
			</a>
			<a class="btn btn-danger" href="#">
				<i class="fa fa-trash-o remove"></i>
			</a>
	</div>
	<br style="clear:both;"/> 
	<input type="text" name="content_type" value="text" class="form-input"/>
	<input type="text" name="content_source" value="" class="form-input"/>
    <textarea name="content" ></textarea>
	{{ csrf_field() }}
</div>
</div>
</div>

@include('backend::includes.components.form.modal') {{-- per ora un include vedere se fare un form component --}}



@push('scripts')
   <script type="text/javascript">
        $(function () {
            var options = {
                //float: true
                width: 12,
                alwaysShowResizeHandle: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent),
                resizable: {
                    handles: 'e, se, s, sw, w'
                }
            };
            $('.grid-stack').gridstack(options);

            new function () {
                this.grid = $('.grid-stack').data('gridstack');

                this.addNewWidget = function () {
                    var node = {
                                x: 0,
                                y: 0,
                                width: 12 ,
                                height: 3
                            };
                    this.grid.addWidget($('#griditem').children().clone(),
                        node.x, node.y, node.width, node.height);
                    return false;
                }.bind(this);

                this.loadGrid = function () {
                    this.grid.removeAll();
                    //this.serializedData //questo e' commentato perche' si usava questa variabile..
                    var $saveddata= JSON.parse($('#saved-data').val());
                    var items = GridStackUI.Utils.sort($saveddata);
                    var $grid=this.grid;
                    _.each(items, function (node){
                        var $el=$grid.addWidget($('#griditem').children().clone(),
                            node.x, node.y, node.width, node.height);
                        for(i in node){
                        	$el.find('[name='+i+']').val(node[i]);
                        };
                    }, this);
                    
                    return false;
                }.bind(this);

                this.saveGrid = function () {
                    this.serializedData = _.map($('.grid-stack > .grid-stack-item:visible'), function (el) {
                        el = $(el);
                        var node = el.data('_gridstack_node');
                        var $data={};
                        $(el).find('input, select, textarea').each(function() {
							$k=$(this).attr('name');
							$v=$(this).val();
                        	//alert($k+'  '+$v);
							$data[$k]=$v; 
						});
                        $data.x=node.x;
                        $data.y=node.y;
                        $data.width=node.width;
                        $data.height=node.height;
                        
                        return $data;
                    }, this);
                    $('#saved-data').val(JSON.stringify(this.serializedData, null, '    '));
                    return false;
                }.bind(this);

                this.clearGrid = function () {
                    this.grid.removeAll();
                    return false;
                }.bind(this);

                $('#save-grid').click(this.saveGrid);
                $('#load-grid').click(this.loadGrid);
                $('#clear-grid').click(this.clearGrid);
                $('#add-new-widget').click(this.addNewWidget);
            };




            
        });
    </script>
@endpush



{{--  
links di riferimento
https://codepen.io/delagics/pen/ezgryg


--}}
