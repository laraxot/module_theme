function loadSocial() {
    // Facebook like button
    $('#hfb').append('<div id="fb-root"></div>');
    $('#hfb').append('<fb:like send="false" layout="box_count" width="60" show_faces="false"></fb:like>');
    jQuery.getScript('//connect.facebook.net/en_US/all.js#xfbml=1', function () {
        FB.init({ appId: 'Your facebook application Id', status: true, cookie: true, xfbml: true });
    });
	
    // Google Plus button
    $('#hgp').append('<g:plusone size="tall"></g:plusone>');
    jQuery.getScript('//apis.google.com/js/plusone.js', function () { });
	
    // Twitter button
    $('#htw').append('<a href="http://twitter.com/share" class="twitter-share-button" data-count="vertical">Tweet</a>');
    jQuery.getScript('//platform.twitter.com/widgets.js', function () { });
	
    // StumbleUpOn badge
    $('#hsu').append('<su:badge layout="5"></su:badge>');
    jQuery.getScript('//platform.stumbleupon.com/1/widgets.js');
	
    // Pinterrest: we have to supply the current URL and page's description
    var curURL = encodeURIComponent(location.protocol + '//' + location.host + location.pathname);
    var curDesc = encodeURIComponent(document.title);
    // Here we provide a thumbnail to Pinterrest,
    // we get the image url from an anchor with a property rel=image_src.
    var curImg = encodeURIComponent($('link[rel=image_src]').attr("href"));
    $('#hpi').append('<a data-pin-config="above" href="//pinterest.com/pin/create/button/?url=' + curURL + '&media=' + curImg + '&description=' + curDesc + '" data-pin-do="buttonPin" ><img src="//assets.pinterest.com/images/pidgets/pin_it_button.png" /></a>');
    jQuery.getScript('//assets.pinterest.com/js/pinit.js');
}


