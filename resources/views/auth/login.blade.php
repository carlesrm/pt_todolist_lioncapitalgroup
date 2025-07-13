@extends('layouts.root')
@section('title', 'Iniciar sesión')
@section('content')
    <div class="mt-20 p-8 max-w-md w-full bg-white rounded-xl shadow-lg">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Iniciar Sesión</h2>

        <form method="POST" action="{{route('login.post')}}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                @error('email')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
                <input
                    type="email"
                    name="email"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="tu@email.com"
                />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Contraseña</label>
                @error('password')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
                <input
                    type="password"
                    name="password"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="••••••••"
                />
            </div>

            <x-global.button size="lg" type="filled" buttonType="submit" classnames="w-full">
                Iniciar Sesión
            </x-global.button>
        </form>

        <div class="mt-6 text-center text-sm text-gray-600">
            No tienes una cuenta?
            <a href="{{route('register')}}" class="text-indigo-600 hover:text-indigo-500 font-medium">Regístrate</a>
        </div>
    </div>
@endsection
