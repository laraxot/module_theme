@props(['thread'])
@php($thread_panel = $_panel->newPanel($thread))
<div class="h-full rounded shadow-lg p-5 bg-white">
    <div class="flex flex-col lg:flex-row lg:justify-between lg:items-center">
        <div>
            <div class="flex flex-col lg:flex-row lg:items-center">
                <div class="flex">
                    <a href="{{ Panel::make()->get($thread->author())->url() }}">
                        <x-theme::avatar :user="$thread->author()" class="w-6 h-6 rounded-full mr-3" />
                    </a>

                    <a href="{{ Panel::make()->get($thread->author())->url() }}" class="hover:underline">
                        <span class="text-gray-900 mr-5">{{ $thread->author()->username() }}</span>
                    </a>
                </div>

                <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                    {{ $thread->createdAt()->format('j M, Y \a\t h:i') }}
                </span>
            </div>
        </div>

        @if (count($tags = $thread->tags()))
            <div class="flex flex-wrap gap-2 mt-2 lg:mt-0 lg:gap-x-4">
                @foreach ($tags as $tag)
                    <a href="{{ route('forum.tag', $tag->slug()) }}" class="flex gap-2">
                        <x-theme::tag>
                            {{ $tag->name() }}
                        </x-theme::tag>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    <div class="mt-3 break-words">
        <a href="{{ $thread_panel->url() }}" class="hover:underline">
            <h3 class="text-xl text-gray-900 font-semibold">
                {{ $thread->subject() }}
            </h3>
        </a>

        <p class="text-gray-800 leading-7 mt-1">
            {!! $thread->excerpt() !!}
        </p>
    </div>

    <div class="flex justify-between items-center mt-4">
        <div class="flex gap-x-5">
            <span class="flex items-center gap-x-2">
                <x-theme::svg icon="o-thumb-up" class="w-6 h-6" />
                <span>{{ count($thread->likes()) }}</span>
                <span class="sr-only">Likes</span>
            </span>

            <span class="flex items-center gap-x-2">
                <x-theme::svg icon="o-chat-alt-2" class="w-6 h-6" />
                <span>{{ count($thread->replies()) }}</span>
                <span class="sr-only">Replies</span>
            </span>
        </div>

        @if ($thread->isSolved())
            <a href="{{ Panel::make()->get($thread)->url() }}#{{ $thread->solution_reply_id }}"
                class="flex items-center gap-x-2 font-medium text-lio-500">
                <x-theme::svg icon="o-badge-check" class="w-6 h-6" />
                <span class="hover:underline">Solved</span>
            </a>
        @endif
    </div>
</div>
