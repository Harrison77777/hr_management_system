@extends('app_layout.layout')
@push('css')


@endpush

@section('content')
<form method="POST" id="logoutFomr" action="{{route('logout')}}">
    @csrf
</form>
<div id="app">
    <div id="main-wrapper">

        <app-layout></app-layout>
    
    </div>
</div>

@endsection

@push('js')

@endpush