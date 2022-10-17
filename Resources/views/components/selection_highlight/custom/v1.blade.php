<article>
    {!! $txt !!}
</article>
<template><span id="control"><b id="tweet"></b><b id="telegram"></b><b id="whatsapp"></b></span></template>


@push('styles')
    <style>
        .highlighted {
            background-color: #FF0;
        }

        .highlighted-salmon {
            background-color: #ffc09a;
        }

        .highlighted-royalblue {
            background-color: #aaffff;
        }

        .highlighted-green {
            background-color: #aaffaa;
        }

        .highlighted-orange {
            background-color: #ffcc00;
        }

    </style>
@endpush



@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        //model.textAreaSelector is the window where i can highlight something
        //in cabolo's case was #text

        //model.getHTMLOfSelection was the selector function
        let textAreaSelector = '#text';

        $(document).on('mouseup', textAreaSelector, getHTMLOfSelection);
        if (!document.all) document.captureEvents(Event.MOUSEUP);

        function changeHighlightColor(type_id, color_id) {

<<<<<<< HEAD
            //tipe=1 è un replace, ovvero un delete e insert se ha lo stesso indice
=======
            //tipe=1 è un replace, ovvero un delete e insert se ha lo stesso indice 
>>>>>>> ede0df7 (first)
            let type_Highlight = color_id;

            let note = $(event.target).closest('span.notes');

            /*$.post('model.note.php', {
                startTime: 1,
                type_id: type_id,
                type_Highlight: type_Highlight
            }, function(data) {*/
            console.log("REPLACE", {
                startTime: 1,
                type_id: type_id,
                type_Highlight: type_Highlight
            });

            let el = note;

            while ($(el).next('[class^=highlighted]').length === 1) {

                el = $(el).next('[class^=highlighted]');

                $(el).removeClass("highlighted");
                $(el).removeClass("highlighted-salmon");
                $(el).removeClass("highlighted-royalblue");
                $(el).removeClass("highlighted-green");
                $(el).removeClass("highlighted-orange");

                let highlightColorClass = "";
                switch (color_id) {
                    case 10:
                        highlightColorClass = "highlighted";
                        break;
                    case 11:
                        highlightColorClass = "highlighted-salmon";
                        break;
                    case 12:
                        highlightColorClass = "highlighted-royalblue";
                        break;
                    case 13:
                        highlightColorClass = "highlighted-green";
                        break;
                    case 14:
                        highlightColorClass = "highlighted-orange";
                        break;
                }

                $(el).addClass(highlightColorClass);

                if ($(el).next().is('span')) {
                    el = $(el).next();
                } else {
                    el = $(el).closest('p').next('p').find('span.notes').first();
                }

            }

            console.log($(note));

            /*});*/
        }

        function deleteHighlight(type_id) {
            let type_Highlight = 0;
            let note = $(event.target).closest('span.notes');


            /*$.post('model.note.php', {
                startTime: 1,
                type_id: type_id,
                type_Highlight: type_Highlight
            }, function(data) {*/
            console.log("DELETE", {
                startTime: 1,
                type_id: type_id,
                type_Highlight: type_Highlight
            });

            $(note).find('.deleteHighlight').remove();

            if ($(note).html().trim() === '') {
                $(note).hide();
            }

            let el = note;

            while ($(el).next('[class^=highlighted]').length === 1) {

                el = $(el).next('[class^=highlighted]');

                $(el).removeClass("highlighted");
                $(el).removeClass("highlighted-salmon");
                $(el).removeClass("highlighted-royalblue");
                $(el).removeClass("highlighted-green");
                $(el).removeClass("highlighted-orange");

                if ($(el).next().is('span')) {
                    el = $(el).next();
                } else {
                    el = $(el).closest('p').next('p').find('span.notes').first();
                }

            }

            console.log($(note));

            /*});*/
        }

        function getHTMLOfSelection() {

            console.log("getHTMLOfSelection");

            var range;
            if (document.selection && document.selection.createRange) {
                range = document.selection.createRange();
                return range.htmlText;
            } else if (window.getSelection) {
                var selection = window.getSelection();
                if (selection.rangeCount > 0) {
                    range = selection.getRangeAt(0);

                    console.log(range);
                    //rivedere come evidenziare
                    /*range.setStart(range.startContainer, 0)
                    range.setEnd(range.endContainer, range.endContainer.length)*/

                    var clonedSelection = range.cloneContents();
                    var div = document.createElement('div');
                    div.appendChild(clonedSelection);

                    console.log("ELEMENT", div);
                    let startTime = $(div).attr('start');
                    let word = $(div).text();
                    let type_Highlight = 1;

                    console.log(startTime, word, type_Highlight);


                    console.log("1 EVIDENZIAZIONE AGGIUNTA (SOLO PRIMA PAROLA)", {
                        startTime: startTime,
                        word: word,
                        type_Highlight: type_Highlight
                    });

                    if ($('#text p span[start="' + startTime + '"]').attr("class") != 'highlighted') {
                        $('#text p span[start="' + startTime + '"]').addClass("highlighted");
<<<<<<< HEAD
                    }
=======
                    } 
>>>>>>> ede0df7 (first)

                    /* per togliere la selezione */
                    range.setStart(range.startContainer, 0)
                    range.setEnd(range.startContainer, 0)

                } else {
                    //
                }
            } else {
                //
            }
        }
    </script>
@endpush
