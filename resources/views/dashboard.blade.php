@extends('layouts.root')

@section('title', 'Inicio')

@section('content')
    <div class="flex flex-col w-full">
        <div class="flex justify-between">
            <h1 class="text-2xl">Lista de tareas</h1>
            {{--  Añadir tarea  --}}
            <x-global.button type="filled" link="{{route('tasks.add')}}" classnames="gap-x-1">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="4 4 16 16"
                    width="0.8rem"
                    height="0.8rem"
                >
                    <path
                        fill="currentColor"
                        d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"
                    ></path>
                </svg>
                <span>Añadir tarea</span>
            </x-global.button>
        </div>
        <div class="flex flex-col gap-y-3 mt-3">
            {{--  Listado de tareas  --}}
            @foreach($tasks as $task)
                <div class="flex flex-col gap-y-2 p-2 border border-gray-200 rounded-md shadow task-item" data-task-id="{{ $task->id }}">
                    <div class="flex justify-between items-center">
                        <div class="flex flex-col gap-y-1">
                            <div class="flex items-center gap-x-3">
                                <h2 class="text-xl font-semibold leading-none text-indigo-600">{{ $task->title }}</h2>
                            </div>
                            <div class="flex sm:hidden items-center gap-x-1 mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    width="1.3em"
                                    height="1.3em"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 16H5V10h14zM9 14H7v-2h2zm4 0h-2v-2h2zm4 0h-2v-2h2zm-8 4H7v-2h2zm4 0h-2v-2h2zm4 0h-2v-2h2z"
                                    ></path>
                                </svg>
                                <span class="text-sm">{{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}</span>
                            </div>
                        </div>
                        <div class="flex items-center gap-x-1">
                            {{--  Fecha de vencimiento de tarea  --}}
                            <div class="hidden sm:flex items-center gap-x-1 mr-2">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    width="1.3em"
                                    height="1.3em"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M19 4h-1V2h-2v2H8V2H6v2H5c-1.11 0-1.99.9-1.99 2L3 20a2 2 0 0 0 2 2h14c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2m0 16H5V10h14zM9 14H7v-2h2zm4 0h-2v-2h2zm4 0h-2v-2h2zm-8 4H7v-2h2zm4 0h-2v-2h2zm4 0h-2v-2h2z"
                                    ></path>
                                </svg>
                                <span class="text-sm">{{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}</span>
                            </div>
                            {{--  Actualizar tarea  --}}
                            <x-global.button classnames="bg-yellow-300 hover:bg-yellow-400 !p-1" link="{{ route('tasks.update', $task->id) }}">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    class="w-5 sm:w-6 h-5 sm:h-6"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83l3.75 3.75z"
                                    ></path>
                                </svg>
                            </x-global.button>
                            {{--  Compartir tarea  --}}
                            <x-global.button classnames="bg-indigo-500 hover:bg-indigo-600 !p-1">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    class="w-5 sm:w-6 h-5 sm:h-6"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81c1.66 0 3-1.34 3-3s-1.34-3-3-3s-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65c0 1.61 1.31 2.92 2.92 2.92s2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92M18 4c.55 0 1 .45 1 1s-.45 1-1 1s-1-.45-1-1s.45-1 1-1M6 13c-.55 0-1-.45-1-1s.45-1 1-1s1 .45 1 1s-.45 1-1 1m12 7.02c-.55 0-1-.45-1-1s.45-1 1-1s1 .45 1 1s-.45 1-1 1"
                                    ></path>
                                </svg>
                            </x-global.button>
                            {{--  Eliminar tarea  --}}
                            <x-global.button classnames="bg-red-500 hover:bg-red-600 !p-1" link="{{ route('tasks.delete', $task->id) }}">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 24 24"
                                    class="w-5 sm:w-6 h-5 sm:h-6"
                                >
                                    <path
                                        fill="currentColor"
                                        d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6zm2.46-7.12l1.41-1.41L12 12.59l2.12-2.12l1.41 1.41L13.41 14l2.12 2.12l-1.41 1.41L12 15.41l-2.12 2.12l-1.41-1.41L10.59 14zM15.5 4l-1-1h-5l-1 1H5v2h14V4z"
                                    ></path>
                                </svg>
                            </x-global.button>
                        </div>
                    </div>
                    <div class="w-full border border-gray-200"></div>
                    <p class="p-2 pt-0 text-sm sm:text-base text-justify">{{ $task->description }}</p>
                    <x-global.button classnames="block sm:hidden w-fit toggle-status-btn js-toggle-btn {{$task->status == 'Completada' ? 'completed' : 'pending'}}" size="sm">{{$task->status}}</x-global.button>
                    <x-global.button classnames="hidden sm:block w-fit toggle-status-btn js-toggle-btn {{$task->status == 'Completada' ? 'completed' : 'pending'}}" size="md">{{$task->status}}</x-global.button>
                </div>
            @endforeach
        </div>
    </div>

{{-- Codigo para actualizar el estado de la tarea  --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.js-toggle-btn').forEach(button => {
                button.addEventListener('click', async function () {
                    const parent = this.closest('.task-item');
                    const taskId = parent.dataset.taskId;

                    const response = await fetch(`/tasks/status/${taskId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        }
                    });

                    const data = await response.json();

                    if (response.ok) {
                        this.innerText = data?.status;
                        this.classList.toggle('completed');
                        this.classList.toggle('pending');

                    } else {
                        alert(data.error || 'Ha ocurrido un problema.');
                    }
                });
            });
        });
    </script>
@endsection
