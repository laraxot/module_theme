<div class="flex items-start">
    <div class="flex flex-col items-center">
        <livewire:like-article :article="$article" />

        <div class="flex flex-col items-center gap-y-5 mt-10">
            <span class="uppercase text-gray-500">Share</span>
            {{-- <a class="text-gray-300 hover:text-twitter" target="_blank" rel="noopener" aria-label="Share on Twitter"
                href="http://twitter.com/share?text={{ urlencode('"' . $article->title() . '" by ' . ($article->author()->twitter() ? '@' . $article->author()->twitter() : $article->author()->name()) . ' - ') }}&url={{ urlencode(Panel::make()->get($article)->url()) }}">
                <x-svg icon="twitter" class="w-6 h-6" />
            </a>

            <a class="text-gray-300 hover:text-facebook" target="_blank" rel="noopener" aria-label="Share on Facebook"
                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Panel::make()->get($article)->url()) }}&quote={{ urlencode('"' . $article->title() . '" by ' . $article->author()->name() . ' - ') }}">
                <x-svg icon="facebook" class="w-6 h-6" />
            </a>

            <a class="text-gray-300 hover:text-linkedin" target="_blank" rel="noopener" aria-label="Share on LinkedIn"
                href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(Panel::make()->get($article)->url()) }}&title={{ urlencode('"' . $article->title() . '" by ' . $article->author()->name() . ' - ') }}">
                <x-svg icon="linkedin" class="w-6 h-6" />
            </a> --}}
        </div>
    </div>
</div>
