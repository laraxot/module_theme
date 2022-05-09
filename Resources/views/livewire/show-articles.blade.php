<div>
    <div class="flex justify-between items-center lg:block">
        <div class="flex justify-between items-center">
            <h1 class="text-4xl text-gray-900 font-bold">
                Articles
            </h1>

            <x-button.primary-button href="{{ route('articles.create') }}" class="hidden lg:block">
                Create Article
            </x-button.primary-button>
        </div>

        <div class="flex items-center justify-between lg:mt-6">
            <h3 class="text-gray-800 text-xl font-semibold">
                {{ number_format($articles->total()) }} Articles
            </h3>

            <div class="hidden lg:flex gap-x-2">
                <x-theme::articles.filter :selectedSortBy="$selectedSortBy" />

                <div class="flex-shrink-0">
                    <x-button.secondary-button class="flex items-center gap-x-2" @click="activeModal = 'tag-filter'">
                        <x-svg icon="o-filter" class="w-5 h-5" />
                        Tag filter
                    </x-button.secondary-button>
                </div>
            </div>
        </div>

        @if ($selectedTag)
            <div class="hidden lg:flex gap-x-4 items-center mt-4 pt-5 border-t">
                Filter applied
                <x-tag>
                    <span class="flex items-center gap-x-1">
                        {{ $selectedTag->name() }}
                        <button type="button" wire:click="toggleTag('')">
                            <x-svg icon="o-x" class="w-5 h-5" />
                        </button>
                    </span>
                </x-tag>
            </div>
        @endisset
</div>

<div class="pt-2 lg:hidden">
    @include('layouts._ads._forum_sidebar')

    <div class="flex gap-x-4 mt-10">
        <div class="w-1/2">
            <x-button.secondary-cta class="w-full" @click="activeModal = 'tag-filter'">
                <span class="flex items-center gap-x-2">
                    <x-svg icon="o-filter" class="w-5 h-5" />
                    Tag filter
                </span>
            </x-button.secondary-cta>
        </div>

        <div class="w-1/2">
            <x-button.primary-cta href="{{ route('articles.create') }}" class="w-full">
                Create Article
            </x-button.primary-cta>
        </div>
    </div>

    <div class="flex mt-4">
        <x-theme::articles.filter :selectedSortBy="$selectedSortBy" />
    </div>

    @if ($selectedTag)
        <div class="flex gap-x-4 items-center mt-4">
            Filter applied
            <x-tag>
                <span class="flex items-center gap-x-1">
                    {{ $selectedTag->name() }}
                    <button type="button" wire:click="toggleTag('')">
                        <x-svg icon="o-x" class="w-5 h-5" />
                    </button>
                </span>
            </x-tag>
        </div>
    @endif
</div>

<section class="mt-8 mb-5 lg:mb-16">
    <div class="flex flex-col gap-y-4">
        @foreach ($articles as $article)
            <x-theme::articles.overview-summary :article="$article" />
        @endforeach
    </div>

    <div class="mt-10">
        {{ $articles->onEachSide(1)->links() }}
    </div>
</section>

<div class="modal" x-show="activeModal === 'tag-filter'" x-cloak>
    <div class="w-full h-full p-8 lg:w-96 lg:h-3/4 overflow-y-scroll">
        <x-theme::articles.tag-filter :selectedTag="$selectedTag ?? null" :tags="$tags" />
    </div>
</div>
</div>
