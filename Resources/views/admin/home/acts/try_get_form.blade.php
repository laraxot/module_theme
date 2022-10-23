@extends('adm_theme::layouts.app')
@section('content')
    <h3>Form</h3>
    <form action="/it/model/create">
        <livewire:form.get form_name="antonio" />
        <input type="submit" value="Submit" class="btn btn-info mt-3">
    </form>
@endsection
