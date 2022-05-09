{{-- https://getbootstrap.com/docs/4.5/components/badge/
  <button type="button" class="btn btn-primary">
  Profile <span class="badge badge-light">9</span>
  <span class="sr-only">unread messages</span>
</button> --}}
{{-- @if (view()->exists('adm_theme::components.badge1'))
    @include('adm_theme::components.badge')
@else
  <span class="badge badge-info">{{ $slot }}</span>
@endif --}}

<span class="badge badge-info">{{ $slot }}</span>
