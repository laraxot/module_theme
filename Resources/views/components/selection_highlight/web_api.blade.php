<article>
    <h1>Select over the text below</h1>
    {!! $txt !!}
</article>
<template>
    <span id="control">
        <b id="tweet"></b><b id="telegram"></b><b id="whatsapp"></b>
    </span>
</template>


@push('styles')
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

    </style>
@endpush



@push('scripts')
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
            alert(`${this.parentNode.text}`);
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
@endpush
