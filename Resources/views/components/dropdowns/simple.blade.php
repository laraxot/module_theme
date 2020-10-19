<div class="btn btn-dark dropdown menu-label">
    <button class="{{ $class ?? ''}}" type="button"  data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ $title }}
    </button>
    <div class="dropdown-menu" >
        {!! $btns !!}
    </div>
</div>


