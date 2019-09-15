@php
//header('Access-Control-Allow-Origin: *');
// Create a stream
$opts = array(
        'http'=>array(
            'method'=>"GET",
            'header'=>"Accept-language: en\r\n" .
            "Cookie: foo=bar\r\n",
            'proxy' => 'tcp://195.206.190.165:8080',
            )
);

$context = stream_context_create($opts);

// Open the file using the HTTP headers set above
$file = file_get_contents('http://ifconfig.me/ip', false, $context);

var_dump($file);

@endphp
<div id="ris">RIS</div>
<div id='parse-data'>Patrse</div>
<script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
{{-- 
http://james.padolsey.com/javascript/cross-domain-requests-with-jquery/
https://github.com/padolsey-archive/jquery.fn/blob/master/cross-domain-ajax/test/test.js
http://www.jacobward.co.uk/using-php-to-scrape-javascript-jquery-json-websites/
https://www.scraperapi.com/blog/the-10-best-web-scraping-tools
--}}
<script>
	/*
	var name = "codemzy";
	var url = "http://anyorigin.com/go?url=" + encodeURIComponent("https://www.codewars.com/users/") + name + "&callback=?";
	$.get(url, function(response) {
  		console.log(response);
	});
	*/
$(document).ready(function () {
	var url="http://www.google.it";
	/*
	$.ajax({
		url: url,
		type: 'GET',
		datatype: 'jsonp',
		headers: { 'Access-Control-Allow-Origin': '*' },
		cors: true ,
       	crossDomain: true
	}).done(function( data ) {
		$('#ris').html(data);
	}).fail(function( data ) {
		$('#ris').html('ERRORE');
	});
	*/
	/*
	var yql   = "https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%22http%3A%2F%2Fexample.com%2F%22&format=json&diagnostics=true&callback=";
                $.get(yql, function(data){
                   document.getElementById('parse-data').innerHTML = data.query.results.body.div.h1;
                });
    */
	
});	


</script>

