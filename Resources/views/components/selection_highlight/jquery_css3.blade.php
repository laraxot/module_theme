<div class="container">
   {!! $txt !!}
</div>
<div id="highlight_menu" style="display:none;">

    <ul class="social-share">
        <li>Link 1</li>
        <li>Link 2</li>
        <li>Link 3</li>
    </ul>

    <div class="caret">
    </div>
</div>

@push('styles')
    <style>
        #highlight_menu {
            font-size: 18px;
            color: #fff;
            border-radius: 5px;
            background: rgba(0, 0, 0, .8);
            position: absolute;
            user-select: none;
            -moz-user-select: none;
            -webkit-user-select: none;
        }

        .highlight_menu_animate {
            transition: top 75ms ease-out, left 75ms ease-out;
        }

        .social-share {
            width: 100%;
            padding: 0;
            margin: 10px;
            margin-top: 14px;
        }

        .social-share li {
            display: inline;
            padding: 10px;
        }

        .caret {
            border-style: solid;
            border-width: 10px 10px 0px 10px;
            border-bottom-color: transparent;
            border-left-color: transparent;
            border-top-color: rgba(0, 0, 0, .8);
            border-right-color: transparent;
            width: 0px;
            height: 0px;
            display: block;
            position: absolute;
            top: 53px;
            left: 45%;
        }

    </style>
@endpush

@push('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(function() {
            var menu = $('#highlight_menu');

            $(document.body).on('mouseup', function(evt) {
                var s = document.getSelection(),
                    r = s.getRangeAt(0);
                if (r && s.toString()) {
                    var p = r.getBoundingClientRect();
                    if (p.left || p.top) {
                        menu.css({
                                left: (p.left + (p.width / 2)) - (menu.width() / 2),
                                top: (p.top - menu.height() - 10),
                                display: 'block',
                                opacity: 0
                            })
                            .animate({
                                opacity: 1
                            }, 300);

                        setTimeout(function() {
                            menu.addClass('highlight_menu_animate');
                        }, 10);
                        return;
                    }
                }
                menu.animate({
                    opacity: 0
                }, function() {
                    menu.hide().removeClass('highlight_menu_animate');
                });
            });
        });
    </script>
@endpush
