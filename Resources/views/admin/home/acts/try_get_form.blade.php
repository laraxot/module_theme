@extends('adm_theme::layouts.app')
@section('content')
    <h3>Form</h3>
    <form action="/it/model/create">
        <livewire:form.get form_name="antonio" />
        <input type="submit" value="Save" class="btn btn-info mt-3">
        <input type="submit" value="Reset" class="btn btn-danger mt-3">
    </form>
@endsection
