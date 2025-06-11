@extends('layouts.root')

@section('title', 'Crear Cuenta')

@section('content')
    <div class="w-full flex justify-center px-4 pt-20">
        <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Regístrate</h2>

            <form method="POST" action="{{route('register.post')}}" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    @error('name')
                    <span class="text-red-400">{{ $message }}</span>
                    @enderror
                    <input
                        type="text"
                        name="name"
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                        placeholder="nombredeusuario"
                    />
                </div>

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
                    Crear cuenta
                </x-global.button>
            </form>
        </div>
    </div>
@endsection
