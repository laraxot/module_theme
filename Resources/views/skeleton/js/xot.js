$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();
    $('table.lazy').addClass('table table-striped table-bordered table-hover table-condensed table-responsive');
    var current_title;
    $(window).blur(function () {
        //var current_href = $(location).attr('href');
        current_title = $(document).attr('title');
        $(document).attr("title", "Enjoy the tribù ! " + current_title);
    });
    $(window).focus(function () {
        $(document).attr("title", current_title);
    });

    window.cookieconsent.initialise({
        "palette": {
            "popup": {
                "background": "#000"
            },
            "button": {
                "background": "#f1d600"
            }
        }
    });

    //------------ MATCH HEIGHT --------------
    if ($.isFunction('matchHeight')) {
        $('.food-item').matchHeight({property: 'min-height'});
        $('.single-restaurant').matchHeight();
        // example of update callbacks (uncomment to test)
        $.fn.matchHeight._beforeUpdate = function (event, groups) {
            //var eventType = event ? event.type + ' event, ' : '';
            //console.log("beforeUpdate, " + eventType + groups.length + " groups");
        }


    	$.fn.matchHeight._afterUpdate = function(event, groups) {
    		//var eventType = event ? event.type + ' event, ' : '';
    		//console.log("afterUpdate, " + eventType + groups.length + " groups");
    	}
    }
	
});  

