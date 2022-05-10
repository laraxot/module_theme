@props(['thread'])

<div class="thread bg-white shadow rounded">
    <div class="border-b">
        <div class="px-6 pt-4 pb-0 lg:py-4">
            <div class="flex flex-row justify-between items-start lg:items-center">
                <div>
                    <div class="flex flex-col lg:flex-row lg:items-center">
                        <div>
                            <a href="{{-- Panel::make()->get($thread->author())->url() --}}" class="flex items-center hover:underline">
                                <x-theme::avatar :user="$thread->author()" class="w-6 h-6 rounded-full mr-3" />
                                <span class="text-gray-900 mr-5">{{ $thread->author()->username() }}</span>
                            </a>
                        </div>

                        <span class="font-mono text-gray-700 mt-1 lg:mt-0">
                            {{ $thread->createdAt()->format('j M, Y \a\t h:i') }}
                        </span>
                    </div>
                </div>

                <div class="flex items-center gap-x-2">
                    @if (count($tags = $thread->tags()))
                        <div class="hidden flex-wrap gap-2 mt-2 lg:mt-0 lg:gap-x-4 lg:flex lg:flex-nowrap">
                            @foreach ($tags as $tag)
                                <a href="{{ route('forum.tag', $tag->slug()) }}">
                                    <x-theme::tag>
                                        {{ $tag->name() }}
                                    </x-theme::tag>
                                </a>
                            @endforeach
                        </div>
                    @endif

                    <x-theme::threads.thread-menu :thread="$thread" />
                </div>
            </div>

            @if (count($tags = $thread->tags()))
                <div class="flex flex-wrap gap-2 my-2 lg:hidden">
                    @foreach ($tags as $tag)
                        <x-theme::tag>
                            {{ $tag->name() }}
                        </x-theme::tag>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    <div class="prose prose-lio max-w-none p-6 break-words" x-data="{}" x-init="function() { highlightCode($el); }"
        x-html="{{ json_encode(replace_links(md_to_html($thread->body()))) }}">
    </div>
    {{-- <div class="px-6 pb-6">
        <livewire:like-thread :thread="$thread" />
=======
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> ede0df75 (first)
    <div class="prose prose-lio max-w-none p-6 break-words" x-data="{}" x-init="function () { highlightCode($el); }"
        x-html="{{ json_encode(replace_links(md_to_html($thread->body()))) }}">
    </div>
    {{-- <div class="px-6 pb-6">
<<<<<<< HEAD
        <livewire:theme::like-thread :thread="$thread" />
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> b6141c95 (first)
=======
>>>>>>> 6aa89a58 (first)
=======
>>>>>>> ede0df75 (first)
=======
        <livewire:like-thread :thread="$thread" />
>>>>>>> ceab487e (.)
    </div> --}}
</div>
