<div class="pt-2 ms-3">
    <strong>{{ $attrs['operativesystem'] }}</strong>
    {{ $attrs['browser'] }}
    <div class="badge badge-secondary-light text-uppercase">Current Session</div>
    <p class="text-sm text-muted">{{ $attrs['iplocation'] }} · {{ $attrs['time'] }}</p>
    <a class="btn btn-link text-primary ps-0" href="#">Log out device</a>
</div>
