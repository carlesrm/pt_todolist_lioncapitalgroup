@extends('layouts.root')

@section('title', 'Home')

@section('content')
    @auth
        <div>Bienvenido a la página de inicio {{ auth()->user()->name }}</div>
    @else
        <div>Bienvenido a la página de inicio.</div>
    @endauth
@endsection
