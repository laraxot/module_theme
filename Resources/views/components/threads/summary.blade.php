@props(['thread'])

<div class="h-full rounded shadow-lg p-5">
    <div class="h-full flex flex-col place-content-between">
        <div class="break-words">
            <div class="flex items-center justify-between mb-2.5">
                <div class="flex items-center">
                    <a href="{{ Panel::make()->get($thread->author())->url() }}">
                        <x-theme::avatar :user="$thread->author()" class="w-8 h-8 rounded-full mr-2" />
                    </a>
                    <a href="{{ Panel::make()->get($thread->author())->url() }}">
                        <span class="font-heading text-sm text-black">{{ $thread->author()->username() }}</span>
                    </a>
                </div>

                <div>
                    <span class="text-sm text-gray-600">
                        {{ $thread->createdAt()->diffForHumans() }}
                    </span>
                </div>
            </div>

            <h3 class="text-gray-900 text-2xl mb-2 leading-8">
                <a href="{{ Panel::make()->get($thread)->url() }}">
                    {{ $thread->subject() }}
                </a>
            </h3>

            <p class="text-gray-800 text-base leading-7 mb-3">
                {!! $thread->excerpt() !!}
            </p>
        </div>

        <x-button.arrow-button href="{{ Panel::make()->get($thread)->url() }}" class="items-end">
            Open thread
        </x-button.arrow-button>
    </div>
</div>
