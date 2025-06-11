@extends('layouts.root')

@section('title', 'Añadir tarea')

@section('content')
    <div class="max-w-md w-full bg-white rounded-xl shadow-lg p-8">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Añadir tarea</h2>

        <form method="POST" action="{{route('tasks.add.post')}}" class="space-y-4">
            @csrf
            {{--  Título  --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                @error('title')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
                <input
                    type="text"
                    name="title"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                    placeholder="Título de tarea"
                />
            </div>
            {{--  Descripción  --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción</label>
                @error('description')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
                <textarea
                    name="description"
                    rows="3"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-colors"
                    placeholder="Escribe aquí en que consiste la tarea."></textarea>
            </div>
            {{--  Fecha de vencimiento  --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Fecha de vencimiento</label>
                @error('deadline')
                <span class="text-red-400">{{ $message }}</span>
                @enderror
                <input
                    type="datetime-local"
                    name="deadline"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                />
            </div>
            {{--  Acciones de formulario  --}}
            <div class="flex flex-col xs:flex-row gap-2">
                <x-global.button size="md" type="ghost" buttonType="button" classnames="w-full" link="{{url()->previous()}}">
                    Cancelar
                </x-global.button>
                <x-global.button size="md" type="filled" buttonType="submit" classnames="w-full">
                    Crear tarea
                </x-global.button>
            </div>
        </form>
    </div>
@endsection
