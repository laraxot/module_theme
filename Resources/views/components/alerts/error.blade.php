 @if (count($errors) > 0)
    <x-theme::alerts.alert type="danger">
        <ul>
            @foreach ($errors->all() as $k => $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-theme::alerts.alert>
@endif