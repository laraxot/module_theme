jQuery(document).ready(function($) {
    var engine=[];
    $(".typeahead").each(function(){
        $this=$(this);
        // Set the Options for "Bloodhound" suggestion engine
        engine[$this.id] = new Bloodhound({
            remote: {
                url: $this.data('href'),//'{{ url('/getPost') }}?post_type=recipe&query=%QUERY%',//$(":focus").data(href),
                wildcard: '%QUERY%'
            },
            datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
            queryTokenizer: Bloodhound.tokenizers.whitespace
        });
    });

    $(".typeahead").typeahead({
        hint: true,
        highlight: true,
        minLength: 1
    }, {
        source: engine[$(this).id].ttAdapter(),
        displayKey: 'title',
        // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
        // the key from the array we want to display (name,id,email,etc...)
        templates: {
            empty: [
                '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
            ],
            header: [
                '<div class="list-group search-results-dropdown">'
            ]
            ,suggestion: function (data) {
                console.log(data);
                var html = '<div class="list-group-item item-with-img">'
                            + '<a class="item-img" href="#" style="">'
                            + '<img src="//placehold.it/30x30" alt="" title="">'
                            + '</a>'
                            + '<h5 class="title">' + data.title + '</h5>'
                            + '</div>';
               // return '<a  class="list-group-item">' + data.title + '</a>'
                return html;
            }
        }
    });
});