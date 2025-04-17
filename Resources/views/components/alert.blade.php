{{--
https://getbootstrap.com/docs/4.5/components/alerts/
--}}
<div class="alert alert-{{$type}} {{($dismissable) ? 'alert-dismissible fade show' : ''}}">
    @if($dismissable)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif

    <h4 class="alert-heading"><i class="icon fas fa-{{$icon}}"></i> {{$title}}</h4>
    <p>{{$slot}}</p>
</div>