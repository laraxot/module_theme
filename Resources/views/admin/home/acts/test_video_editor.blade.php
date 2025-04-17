@extends('adm_theme::layouts.app')
@section('content')
    <x-navbar>
        @foreach ($drivers as $k => $v)
            <x-navbar.item href="{!! Request::fullUrlWithQuery(['i' => $k]) !!}"
                active="{{ $driver == $v ? 'active' : '' }}">
                {{ $v }}
            </x-navbar.item>
        @endforeach
    </x-navbar>


    <x-col size="12">
        {!! Form::model(new stdClass(),['url'=>Request::fullUrl() ]) !!}
        @method('put')
        <x-video-editor :driver="$driver" :mp4Src="$mp4_src"></x-video-editor>
        <input type="submit" value="go!">
        </form>
    </x-col>
@endsection
