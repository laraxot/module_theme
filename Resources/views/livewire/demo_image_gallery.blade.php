@push('styles')
    <style>
        .imageBoxContainer {
            width: 300px;
            left: 50%;
            right: 50%;
            margin-left: auto;
            margin-right: auto;
        }

        .imageBox {
            width: 300px;
            height: 272px;
            background-color: #18bc9c38;
            border-radius: 5px;
            border: 1px solid silver;
        }

        .imageElement {
            max-width: 100%;
            max-height: 100%;
            position: relative;
            left: 50%;
            top: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }

        .sub {
            width: 300px;
            display: -webkit-box;
            overflow: hidden;
            text-overflow: ellipsis;
            -webkit-line-clamp: 3;
            line-clamp: 3;
            -webkit-box-orient: vertical;
        }

        .sub:hover{
            cursor:pointer;
            background-color: rgba(24,188,156,var(--tw-bg-opacity));
        }

        .sub>svg {
            display: inline-block;
            vertical-align: -0.125em;
        }

        .sub>.title {

            display: contents;
            float: right;
        }

        .nav-item {
            color: white;
        }

        #nav>div {
            display: inline-block;
            color: grey;
            background: white;
            border-radius: 5px 5px 0 0;
            border: 2px solid silver;
        }

        #nav>div:hover {
            background: silver;
            cursor: pointer;
        }

        .highlight {
            background: rgb(24 188 156 / 36%);
        }

        .fixedBottom {
            position: fixed;
            bottom: 0;
            z-index: 1000;
            margin: 0;
            width: 100%;
        }

    </style>
@endpush


<div>

    <div id="nav" class="bg-lio-500 text-white text-base justify-center text-center p-0 mb-3">

        <div class="p-2" wire:click="changeTab('all')">All_Images</div>
        @foreach ($tabs as $index => $element)
            <div class="p-2" wire:click="changeTab('{{ $element }}')">{{ $element }}</div>
        @endforeach

    </div>

    <div class="container-large">

        <div class="row text-center">

            <div class="wrapper">
                @foreach ($showed_image as $index => $element)

                    <div class="inline-block">
                        <div class="imageBox">
                            @if (isset($element['base64']))
                                <img src="data:image/jpg;base64,{{ $element['base64'] }}" class="imageElement" />
                            @elseif($element['url'])
                                <img src="{{ $element['url'] }}" class="imageElement" />
                            @endif
                        </div>

                        <div class="sub mb-3 {{ $element['class'] }}" wire:click="getBookmarked({{ $index }})">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-right-circle" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h5.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H4.5z">
                                </path>
                            </svg>
                            <span class="title" id="title_{{ $index }}">{{ $element['title'] }}</span>

                        </div>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('got_bookmark', event => {

            let answer = prompt('Image bookmarked ' + event.detail.showed_number +
                ' times.\n\nIn wich folder do you want to save this image?');

            if (answer !== null) {
                Livewire.emit('addBookmark', event.detail.image_id, answer);
            }

        });

        let initial_position = 0;

        function isHidden(el) {
            return (window.scrollY > initial_position)
        }

        function bottomMenu() {
            if (isHidden(document.getElementById('nav'))) {
                document.getElementById('nav').classList.add("fixedBottom");
            } else {
                document.getElementById('nav').classList.remove("fixedBottom");
            }
        }

        document.addEventListener('scroll', function() {
            bottomMenu();
        });

        if (window.scrollY > initial_position) {
            bottomMenu();
        }
    </script>
@endpush
