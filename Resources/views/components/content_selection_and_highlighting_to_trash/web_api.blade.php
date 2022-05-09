@section('custom_css')
    <style>
        #control {
            cursor: pointer;
            position: absolute;
            width: 120px;
            height: 40px;
            border-radius: 2px;
            background-color: black;
        }

        #control::before {
            position: absolute;
            content: '';
            border-top: 10px solid black;
            border-left: 10px solid transparent;
            border-right: 10px solid transparent;
            left: 50px;
            top: 40px;
        }

        #control b {
            display: inline-block;
            width: 40px;
            height: 40px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: 70%;
        }

        #tweet {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/c/ce/Twitter_Logo.png');
        }

        #telegram {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/8/82/Telegram_logo.svg');
        }

        #whatsapp {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/c/cc/WhatsApp_Logo.svg');
        }

        article {
            background: white;
            border-radius: 4px;
            font-size: 13pt;
            margin: auto;
            padding: 30px;
            position: absolute;
            text-align: justify;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            width: 300px;
            height: 400px;
        }

        h1 {
            font-size: 17pt;
            text-align: center;
            text-decoration-line: underline;
            text-decoration-color: yellow;
        }

        body {
            background-image: linear-gradient(45deg, beige, azure);
            font-family: 'crimson text';
        }

    </style>
@endsection

<article>
    <h1>Select over the text below</h1>
    <p>Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written
        in a markup language such as HTML. CSS is a cornerstone technology of the World Wide Web, alongside HTML and
        JavaScript. CSS is designed to enable the separation of presentation and content, including layout, colors, and
        fonts. This separation can improve content accessibility, provide more flexibility and control in the
        specification of presentation characteristics. </p>
</article>
<template><span id="control"><b id="tweet"></b><b id="telegram"></b><b id="whatsapp"></b></span></template>

@section('custom_js')
    <script>
        var control = document.importNode(document.querySelector('template').content, true).childNodes[0];
        control.addEventListener('pointerdown', oncontroldown, true);

        document.querySelector('p').onpointerup = () => {
            let selection = document.getSelection(),
                text = selection.toString();
            if (text !== "") {
                let rect = selection.getRangeAt(0).getBoundingClientRect();
                control.style.top = `calc(${rect.top}px - 48px)`;
                control.style.left = `calc(${rect.left}px + calc(${rect.width}px / 2) - 40px)`;
                control['text'] = text;
                document.body.appendChild(control);
                document.querySelector('#tweet').addEventListener('pointerdown', ontweetdown, true);
                document.querySelector('#telegram').addEventListener('pointerdown', ontelegramdown, true);
                document.querySelector('#whatsapp').addEventListener('pointerdown', onwhatsappdown, true);

            }
        }

        function oncontroldown(event) {
            document.getSelection().removeAllRanges();
            this.remove();
        }

        function ontweetdown(event) {
            window.open(`https://twitter.com/intent/tweet?text=${this.parentNode.text}`)
            event.stopPropagation();
        }

        function ontelegramdown(event) {
            window.open(`https://t.me/share/url?url=example.com&text=${this.parentNode.text}`)
            event.stopPropagation();
        }

        function onwhatsappdown(event) {
            window.open(`https://api.whatsapp.com/send/?text=${this.parentNode.text}`)
            event.stopPropagation();
        }
        document.onpointerdown = () => {
            let control = document.querySelector('#control');
            if (control !== null) {
                control.remove();
                document.getSelection().removeAllRanges();
            }
        }
    </script>
@endsection
