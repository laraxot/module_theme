<div>
@php
    Theme::add('https://wwwendt.de/tech/fancytree/lib/jquery.js');
    Theme::add('https://wwwendt.de/tech/fancytree/src/skin-win8/ui.fancytree.css');
    Theme::add('https://wwwendt.de/tech/fancytree/src/jquery-ui-dependencies/jquery.fancytree.ui-deps.js');
    Theme::add('https://wwwendt.de/tech/fancytree/src/jquery.fancytree.js');
    Theme::add('https://wwwendt.de/tech/fancytree/src/jquery.fancytree.dnd5.js');
    Theme::add('https://wwwendt.de/tech/fancytree/src/jquery.fancytree.multi.js');
    Theme::add('https://wwwendt.de/tech/fancytree/demo/sample.js');
@endphp


 @if (session()->has('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
    @endif

<div id="tree" class="fancytree-checkbox-auto-hide" wire:ignore>
</div>

@push('scripts')
<script type="text/javascript">
	$(function(){
		// Attach the fancytree widget to an existing <div id="tree"> element
		// and pass the tree options as an argument to the fancytree() function:
		$("#tree").fancytree({
			extensions: ["dnd5", "multi"],
			checkbox: true,
//			debugLevel: 1,
			source: {
				url: "/ajax-tree-products.json"
			},
			activate: function(event, data) {
			},
			lazyLoad: function(event, data) {
				data.result = {url: "ajax-sub2.json"}
			},
			dnd5: {
				preventVoidMoves: true, // Prevent moving nodes 'before self', etc.
				preventRecursion: true, // Prevent dropping nodes on own descendants
				preventSameParent: false, // Prevent dropping nodes under the same direct parent
				autoExpandMS: 1000,
				multiSource: true,  // drag all selected nodes (plus current node)
				// focusOnClick: true,
				// refreshPositions: true,
				dragStart: function(node, data) {
					// allow dragging `node`:
					data.effectAllowed = "all";
					data.dropEffect = data.dropEffectSuggested;  //"link";
 					// data.dropEffect = "move";
					return true;
				},
				// dragDrag: function(node, data) {
				// 	data.node.info("dragDrag", data);
				// 	data.dropEffect = "copy";
				// 	return true;
				// },
				dragEnter: function(node, data) {
					data.node.info("dragEnter", data);
					// data.dropEffect = "link";
					return true;
				},
				dragOver: function(node, data) {
					// data.node.info("dragOver", data);
					data.dropEffect = data.dropEffectSuggested;  //"link";
					return true;
				},
				dragEnd: function(node, data) {
					data.node.info("dragEnd", data);
                    @this.test();
				},
				dragDrop: function(node, data) {
					// This function MUST be defined to enable dropping of items on the tree.
					//
					// The source data is provided in several formats:
					//   `data.otherNode` (null if it's not a FancytreeNode from the same page)
					//   `data.otherNodeData` (Json object; null if it's not a FancytreeNode)
					//   `data.dataTransfer.getData()`
					//
					// We may access some meta data to decide what to do:
					//   `data.hitMode` ("before", "after", or "over").
					//   `data.dropEffect`, `.effectAllowed`
					//   `data.originalEvent.shiftKey`, ...
					//
					// Example:

					var sourceNodes = data.otherNodeList,
						copyMode = data.dropEffect !== "move";

          if( data.hitMode === "after" ){
            // If node are inserted directly after tagrget node one-by-one,
            // this would reverse them. So we compensate:
            sourceNodes.reverse();
          }
					if( copyMode ) {
						$.each(sourceNodes, function(i, o){
              o.info("copy to " + node + ": " + data.hitMode);
							o.copyTo(node, data.hitMode, function(n){
								delete n.key;
								n.selected = false;
								n.title = "Copy of " + n.title;
							});
						});
					} else {
						$.each(sourceNodes, function(i, o){
              o.info("move to " + node + ": " + data.hitMode);
							o.moveTo(node, data.hitMode);
						});
					}
					node.debug("drop", data);
					node.setExpanded();
				}
			}
		});

	});
	</script>
@endpush
