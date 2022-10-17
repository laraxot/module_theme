@php
Theme::add('https://grapesjs.com/stylesheets/toastr.min.css');
Theme::add('https://grapesjs.com/stylesheets/grapes.min.css');
Theme::add('https://grapesjs.com/stylesheets/grapesjs-preset-webpage.min.css');
Theme::add('https://grapesjs.com/stylesheets/tooltip.css');
Theme::add('https://grapesjs.com/stylesheets/grapesjs-plugin-filestack.css');
Theme::add('https://grapesjs.com/stylesheets/demos.css');
Theme::add('https://unpkg.com/grapick/dist/grapick.min.css');

Theme::add('https://grapesjs.com/js/toastr.min.js');

Theme::add('https://grapesjs.com/js/grapes.min.js');
Theme::add('https://grapesjs.com/js/grapesjs-preset-webpage.min.js');
Theme::add('https://grapesjs.com/js/grapesjs-lory-slider.min.js');
Theme::add('https://grapesjs.com/js/grapesjs-tabs.min.js');
Theme::add('https://grapesjs.com/js/grapesjs-custom-code.min.js');
Theme::add('https://grapesjs.com/js/grapesjs-touch.min.js');
Theme::add('https://grapesjs.com/js/grapesjs-parser-postcss.min.js');
Theme::add('https://grapesjs.com/js/grapesjs-tooltip.min.js');
Theme::add('https://grapesjs.com/js/grapesjs-tui-image-editor.min.js');
Theme::add('https://grapesjs.com/js/grapesjs-typed.min.js');
Theme::add('https://grapesjs.com/js/grapesjs-style-bg.min.js');
@endphp
@push('styles')
    <style type="text/css">
        .icon-add-comp::before,
        .icon-comp100::before,
        .icon-comp50::before,
        .icon-comp30::before,
        .icon-rm::before {
            content: '';
        }

        .icon-add-comp {
            background: url("./img/icon-sq-a.png") no-repeat center;
        }

        .icon-comp100 {
            background: url("./img/icon-sq-1.png") no-repeat center;
        }

        .icon-comp50 {
            background: url("./img/icon-sq-2.png") no-repeat center;
        }

        .icon-comp30 {
            background: url("./img/icon-sq-3.png") no-repeat center;
        }

        .icon-rm {
            background: url("./img/icon-sq-r.png") no-repeat center;
        }

        .icons-flex {
            background-size: 70% 65% !important;
            height: 15px;
            width: 17px;
            opacity: 0.9;
        }

        .icon-dir-row {
            background: url("./img/flex-dir-row.png") no-repeat center;
        }

        .icon-dir-row-rev {
            background: url("./img/flex-dir-row-rev.png") no-repeat center;
        }

        .icon-dir-col {
            background: url("./img/flex-dir-col.png") no-repeat center;
        }

        .icon-dir-col-rev {
            background: url("./img/flex-dir-col-rev.png") no-repeat center;
        }

        .icon-just-start {
            background: url("./img/flex-just-start.png") no-repeat center;
        }

        .icon-just-end {
            background: url("./img/flex-just-end.png") no-repeat center;
        }

        .icon-just-sp-bet {
            background: url("./img/flex-just-sp-bet.png") no-repeat center;
        }

        .icon-just-sp-ar {
            background: url("./img/flex-just-sp-ar.png") no-repeat center;
        }

        .icon-just-sp-cent {
            background: url("./img/flex-just-sp-cent.png") no-repeat center;
        }

        .icon-al-start {
            background: url("./img/flex-al-start.png") no-repeat center;
        }

        .icon-al-end {
            background: url("./img/flex-al-end.png") no-repeat center;
        }

        .icon-al-str {
            background: url("./img/flex-al-str.png") no-repeat center;
        }

        .icon-al-center {
            background: url("./img/flex-al-center.png") no-repeat center;
        }

        [data-tooltip]::after {
            background: rgba(51, 51, 51, 0.9);
        }

        .gjs-pn-commands {
            min-height: 40px;
        }

        #gjs-sm-float,
        .gjs-pn-views .fa-cog {
            display: none;
        }

        .gjs-am-preview-cont {
            height: 100px;
            width: 100%;
        }

        .gjs-logo-version {
            background-color: #756467;
        }

        .gjs-pn-panel.gjs-pn-views {
            padding: 0;
            border-bottom: none;
        }

        .gjs-pn-btn.gjs-pn-active {
            box-shadow: none;
        }

        .gjs-pn-views .gjs-pn-btn {
            margin: 0;
            height: 40px;
            padding: 10px;
            width: 33.3333%;
            border-bottom: 2px solid rgba(0, 0, 0, 0.3);
        }

        .CodeMirror {
            min-height: 450px;
            margin-bottom: 8px;
        }

        .grp-handler-close {
            background-color: transparent;
            color: #ddd;
        }

        .grp-handler-cp-wrap {
            border-color: transparent;
        }

    </style>
@endpush
@extends('adm_theme::layouts.app')
@section('content')
    <div id="gjs">
        <h1>Test</h1>
    </div>

    <div id="info-panel" style="display:none">

    </div>
    <div style="display: none">
        <div class="gjs-logo-cont">
            <a href="https://grapesjs.com">gjs</a>
            <div class="gjs-logo-version"></div>
        </div>
    </div>
    <div class="ad-cont">

    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        var lp = './img/';
        var plp = 'https://via.placeholder.com/350x250/';
        var images = [
            lp + 'team1.jpg', lp + 'team2.jpg', lp + 'team3.jpg', plp + '78c5d6/fff/image1.jpg', plp +
            '459ba8/fff/image2.jpg', plp + '79c267/fff/image3.jpg',
            plp + 'c5d647/fff/image4.jpg', plp + 'f28c33/fff/image5.jpg', plp + 'e868a2/fff/image6.jpg', plp +
            'cc4360/fff/image7.jpg',
            lp + 'work-desk.jpg', lp + 'phone-app.png', lp + 'bg-gr-v.png'
        ];
        var plugins_opts_path = '{{ Theme::asset('theme::json/grapejs/plugins_opts.json') }}';

        var editor = grapesjs.init({
            avoidInlineStyle: 1,
            //height: '100%',
            container: '#gjs',
            fromElement: 1,
            showOffsets: 1,
            assetManager: {
                embedAsBase64: 1,
                assets: images
            },
            selectorManager: {
                componentFirst: true
            },
            styleManager: {
                sectors: []
            },
            plugins: [
                'grapesjs-lory-slider',
                'grapesjs-tabs',
                'grapesjs-custom-code',
                'grapesjs-touch',
                'grapesjs-parser-postcss',
                'grapesjs-tooltip',
                'grapesjs-tui-image-editor',
                'grapesjs-typed',
                'grapesjs-style-bg',
                'gjs-preset-webpage',
            ],
            pluginsOpts: $.getJSON(plugins_opts_path)
        });

        editor.I18n.addMessages({
            en: {
                styleManager: {
                    properties: {
                        'background-repeat': 'Repeat',
                        'background-position': 'Position',
                        'background-attachment': 'Attachment',
                        'background-size': 'Size',
                    }
                },
            }
        });

        var pn = editor.Panels;
        var modal = editor.Modal;
        var cmdm = editor.Commands;
        cmdm.add('canvas-clear', function() {
            if (confirm('Areeee you sure to clean the canvas?')) {
                var comps = editor.DomComponents.clear();
                setTimeout(function() {
                    localStorage.clear()
                }, 0)
            }
        });
        cmdm.add('set-device-desktop', {
            run: function(ed) {
                ed.setDevice('Desktop')
            },
            stop: function() {},
        });
        cmdm.add('set-device-tablet', {
            run: function(ed) {
                ed.setDevice('Tablet')
            },
            stop: function() {},
        });
        cmdm.add('set-device-mobile', {
            run: function(ed) {
                ed.setDevice('Mobile portrait')
            },
            stop: function() {},
        });



        // Add info command
        var mdlClass = 'gjs-mdl-dialog-sm';
        var infoContainer = document.getElementById('info-panel');
        cmdm.add('open-info', function() {
            var mdlDialog = document.querySelector('.gjs-mdl-dialog');
            mdlDialog.className += ' ' + mdlClass;
            infoContainer.style.display = 'block';
            modal.setTitle('About this demo');
            modal.setContent(infoContainer);
            modal.open();
            modal.getModel().once('change:open', function() {
                mdlDialog.className = mdlDialog.className.replace(mdlClass, '');
            })
        });
        pn.addButton('options', {
            id: 'open-info',
            className: 'fa fa-question-circle',
            command: function() {
                editor.runCommand('open-info')
            },
            attributes: {
                'title': 'About',
                'data-tooltip-pos': 'bottom',
            },
        });


        // Simple warn notifier
        var origWarn = console.warn;
        toastr.options = {
            closeButton: true,
            preventDuplicates: true,
            showDuration: 250,
            hideDuration: 150
        };
        console.warn = function(msg) {
            if (msg.indexOf('[undefined]') == -1) {
                toastr.warning(msg);
            }
            origWarn(msg);
        };


        // Add and beautify tooltips
        [
            ['sw-visibility', 'Show Borders'],
            ['preview', 'Preview'],
            ['fullscreen', 'Fullscreen'],
            ['export-template', 'Export'],
            ['undo', 'Undo'],
            ['redo', 'Redo'],
            ['gjs-open-import-webpage', 'Import'],
            ['canvas-clear', 'Clear canvas']
        ]
        .forEach(function(item) {
            pn.getButton('options', item[0]).set('attributes', {
                title: item[1],
                'data-tooltip-pos': 'bottom'
            });
        });
        [
            ['open-sm', 'Style Manager'],
            ['open-layers', 'Layers'],
            ['open-blocks', 'Blocks']
        ]
        .forEach(function(item) {
            pn.getButton('views', item[0]).set('attributes', {
                title: item[1],
                'data-tooltip-pos': 'bottom'
            });
        });
        var titles = document.querySelectorAll('*[title]');

        for (var i = 0; i < titles.length; i++) {
            var el = titles[i];
            var title = el.getAttribute('title');
            title = title ? title.trim() : '';
            if (!title)
                break;
            el.setAttribute('data-tooltip', title);
            el.setAttribute('title', '');
        }

        // Show borders by default
        pn.getButton('options', 'sw-visibility').set('active', 1);


        // Store and load events
        editor.on('storage:load', function(e) {
            console.log('Loaded ', e)
        });
        editor.on('storage:store', function(e) {
            console.log('Stored ', e)
        });


        // Do stuff on load
        editor.on('load', function() {
            var $ = grapesjs.$;

            // Show logo with the version
            var logoCont = document.querySelector('.gjs-logo-cont');
            document.querySelector('.gjs-logo-version').innerHTML = 'v' + grapesjs.version;
            var logoPanel = document.querySelector('.gjs-pn-commands');
            logoPanel.appendChild(logoCont);


            // Load and show settings and style manager
            var openTmBtn = pn.getButton('views', 'open-tm');
            openTmBtn && openTmBtn.set('active', 1);
            var openSm = pn.getButton('views', 'open-sm');
            openSm && openSm.set('active', 1);

            // Add Settings Sector
            var traitsSector = $('<div class="gjs-sm-sector no-select">' +
                '<div class="gjs-sm-sector-title"><span class="icon-settings fa fa-cog"></span> <span class="gjs-sm-sector-label">Settings</span></div>' +
                '<div class="gjs-sm-properties" style="display: none;"></div></div>');
            var traitsProps = traitsSector.find('.gjs-sm-properties');
            traitsProps.append($('.gjs-trt-traits'));
            $('.gjs-sm-sectors').before(traitsSector);
            traitsSector.find('.gjs-sm-sector-title').on('click', function() {
                var traitStyle = traitsProps.get(0).style;
                var hidden = traitStyle.display == 'none';
                if (hidden) {
                    traitStyle.display = 'block';
                } else {
                    traitStyle.display = 'none';
                }
            });

            // Open block manager
            var openBlocksBtn = editor.Panels.getButton('views', 'open-blocks');
            openBlocksBtn && openBlocksBtn.set('active', 1);

            // Move Ad
            //$('#gjs').append($('.ad-cont'));
            @verbatim
                editor.BlockManager.add('my-var-block', {
                label: 'Simple variable',
                content: '{{ SOME_VAR_EXAMPLE }}',
                });
                editor.DomComponents.addType('input', {
                isComponent: el => el.tagName == 'INPUT',
                model: {
                defaults: {
                traits: [
                // Strings are automatically converted to text types
                'name', // Same as: { type: 'text', name: 'name' }
                'placeholder',
                {
                type: 'select', // Type of the trait
                label: 'Type', // The label you will see in Settings
                name: 'type', // The name of the attribute/property to use on component
                options: [
                { id: 'text', name: 'Text'},
                { id: 'email', name: 'Email'},
                { id: 'password', name: 'Password'},
                { id: 'number', name: 'Number'},
                ]
                }, {
                type: 'checkbox',
                name: 'required',
                }],
                // As by default, traits are binded to attributes, so to define
                // their initial value we can use attributes
                attributes: { type: 'text', required: true },
                },
                },
                });
<<<<<<< HEAD


=======
            
            
>>>>>>> ede0df7 (first)
            @endverbatim


        });
    </script>
@endpush

{{-- -- il settings e' a lato non sopra
    https://grapesjs.com/docs/modules/Traits.html#updating-traits-at-run-time --}}
