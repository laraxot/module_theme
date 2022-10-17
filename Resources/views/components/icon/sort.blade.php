@props(['sortBy', 'sortAsc', 'sortField'])
<<<<<<< HEAD
{{--
=======
{{--  
>>>>>>> ede0df7 (first)
    https://github.com/ascsoftw/tall-crud-generator/blob/main/resources/views/components/sort-icon.blade.php
    --}}

@if( $sortBy == $sortField)
    @if( !$sortAsc)
        <span class="w-4 h-4 ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </span>
    @endif

    @if( $sortAsc)
        <span class="w-4 h-4 ml-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd" />
            </svg>
        </span>
    @endif
@endif