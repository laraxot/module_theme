@props(['thread', 'reply'])

<div class="h-full rounded shadow-lg p-5 bg-white">
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center">
        <div>
            <div class="flex flex-col lg:flex-row lg:items-center">
                <div class="flex">
                    <a href="{{ Panel::make()->get($reply->author())->url() }}">
                        <x-theme::avatar :user="$reply->author()" class="w-6 h-6 rounded-full mr-3" />
                    </a>

                    <a href="{{ Panel::make()->get($reply->author())->url() }}" class="hover:underline">
                        <span class="text-gray-900 mr-5">{{ $reply->author()->username() }}</span>
                    </a>
                </div>

                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                    {{ $reply->createdAt()->format('j M, Y \a\t h:i') }}
                </span>
            </div>
        </div>
    </div>

    <div class="mt-3 break-words">
        <a href="{{ Panel::make()->get($thread)->url() }}" class="hover:underline">
            <h3 class="text-xl text-gray-900 font-semibold">
                {{ $thread->subject() }}
            </h3>
        </a>

        <p class="text-gray-800 leading-7 mt-1">
            {!! $reply->excerpt() !!}
        </p>
    </div>

    <div class="flex justify-between items-center mt-4">
        <div class="flex gap-x-5">
            <span class="flex items-center gap-x-2">
                <x-svg icon="o-thumb-up" class="w-6 h-6" />
                <span>{{ count($reply->likes()) }}</span>
                <span class="sr-only">Likes</span>
            </span>
        </div>

        @if ($thread->isSolutionReply($reply))
            <span class="flex items-center gap-x-2 font-medium text-lio-500">
                <x-svg icon="o-badge-check" class="w-6 h-6" />
                <span class="hover:underline">Solved</span>
                </a>
        @endif
    </div>
</div>
