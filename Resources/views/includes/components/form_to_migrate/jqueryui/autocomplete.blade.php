<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<style>
	.ui-autocomplete-loading {
	background: white url("images/ui-anim_basic_16x16.gif") right center no-repeat;
	}
</style>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$( function() {
	var cache = {};
	$( "#birds" ).autocomplete({
		minLength: 2,
		source: function( request, response ) {
			var term = request.term;
			if ( term in cache ) {
				response( cache[ term ] );
				return;
			}

			$.getJSON( "search.php", request, function( data, status, xhr ) {
				cache[ term ] = data;
				response( data );
			});
		}
	});
});
</script>

<div class="ui-widget">
<label for="birds">Birds: </label>
	<input id="birds">
</div>
