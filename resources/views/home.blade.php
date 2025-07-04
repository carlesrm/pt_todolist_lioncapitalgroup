@extends('layouts.root')

@section('title', 'Bienvenido')

@section('content')
    <div
        class="rounded-3xl px-5 max-w-2xl w-full text-center translate-y-10 animate-fade-in-up"
    >
        <h1 class="text-5xl font-extrabold text-indigo-700 mb-6 leading-tight transition-all duration-700">
            Organiza tu vida, una tarea a la vez
        </h1>

        <p class="text-lg text-gray-600 mb-8">
            Bienvenido a <span class="inline-block text-indigo-500 font-semibold animate-hover-text">ToDoList App</span>, tu espacio personal para anotar, seguir y completar tareas diarias.
        </p>

        <div class="sm:hidden flex flex-col xs:flex-row justify-center gap-4 !text-sm">
            <x-global.button size="md" link="{{route('register')}}">
                Empezar ahora
            </x-global.button>
            <x-global.button size="md" type="ghost" link="{{route('login')}}">
                Ya tengo cuenta
            </x-global.button>
        </div>

        <div class="hidden sm:flex flex-col xs:flex-row justify-center gap-4 !text-sm">
            <x-global.button size="lg" link="{{route('register')}}">
                Empezar ahora
            </x-global.button>
            <x-global.button size="lg" type="ghost" link="{{route('login')}}">
                Ya tengo cuenta
            </x-global.button>
        </div>
    </div>
@endsection
