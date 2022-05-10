<x-form method="GET" :action="Request::fullUrlWithQuery([])">
    {{-- <input class="form-control form-control-sm border-0 shadow-0 bg-gray-200" id="search_search" placeholder="Search"
        aria-label="Search" type="search" name="q"> --}}
    <div class="input-group mb-3">
        <input class="form-control bg-transparent border-dark border-end-0" type="search" placeholder="Search here"
            aria-label="Search here" name="q" value="{{ request('q') }}">
        <button class="btn btn-outline-dark border-start-0" type="submit">
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
            <i class="{{ $attrs['icon'] }} text-lg"></i>
=======
            <i class="fa fa-search text-lg"></i>
>>>>>>> b6141c95 (first)
=======
            <i class="fa fa-search text-lg"></i>
>>>>>>> 6aa89a58 (first)
=======
            <i class="fa fa-search text-lg"></i>
>>>>>>> ede0df75 (first)
        </button>
    </div>
</x-form>
