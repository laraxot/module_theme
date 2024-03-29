{{--
   https://github.com/ascsoftw/tall-crud-generator/blob/main/resources/views/components/tooltip.blade.php
--}}
<span x-data="{ tooltip: false }" x-on:mouseover="tooltip = true" x-on:mouseleave="tooltip = false" class="ml-2 h-5 w-5 cursor-pointer">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
    <div x-show="tooltip" class="text-sm text-white absolute bg-blue-400 rounded-lg p-2 transform -translate-y-8 translate-x-8">
        {{$slot}}
    </div>
</span>