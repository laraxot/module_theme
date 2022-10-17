@php
    Theme::addSelect2();
<<<<<<< HEAD
    $action=route('containers.store',array_merge($params,['container1'=>'cuisineCat']));
=======
    $action=route('containers.store',array_merge($params,['container1'=>'cuisineCat']));    
>>>>>>> ede0df7 (first)
@endphp
{{-- $action --}}
<form method="POST" action="{{ $action }}" {{--  class="form-inline" --}} role="form">
    @csrf
    <input type="hidden" name="_action" value="come_back" />
    <div class="input-group">
<<<<<<< HEAD

        <select class="form-control select2ajax" name="title" data-tags="true"
        data-placeholder="Clicca qui per nuova Tipologia Cucina"
        data-allow-clear="true" data-ajax--url="{{ url('/it/cuisineCat')}}" >

        {{--  data-ajax--cache="true" --}}

=======
        
        <select class="form-control select2ajax" name="title" data-tags="true" 
        data-placeholder="Clicca qui per nuova Tipologia Cucina"
        data-allow-clear="true" data-ajax--url="{{ url('/it/cuisineCat')}}" >
        
        {{--  data-ajax--cache="true" --}}
        
>>>>>>> ede0df7 (first)
        </select>
        @if ($errors->any())
            <div class="alert">
                @foreach ($errors->all() as $error)
                    <strong>{{ $error }}</strong>
                @endforeach
            </div>
        @endif
        <span class="input-group-btn">
            <button class="btn btn-primary btn-sm" type="submit">
                <i class="fa fa-plus"></i>
            </button>
        </span>
    </div>
</form>


