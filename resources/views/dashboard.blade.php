@extends('layouts.root')

@section('title', 'Inicio')

@section('content')
    <div class="flex flex-col p-4 w-full">
        <div class="flex flex-col p-4 gap-y-2 bg-white rounded-lg">
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
            {{--  Filtros de tareas  --}}
            <div class="flex flex-col xs:flex-row xs:justify-between gap-y-2">
                <div class="flex flex-col xs:items-start">
                    <h3>Estado de tarea</h3>
                    <select class="js-filter-status border rounded-md">
                        <option {{ request('filter_status') == 'Pendiente' ? 'selected' : '' }} value="Pendiente">Pendiente</option>
                        <option {{ request('filter_status') == 'Completada' ? 'selected' : '' }} value="Completada">Completada</option>
                    </select>
                </div>
                <div class="flex flex-col xs:items-end">
                    <h3>Ordenar por</h3>
                    <select class="js-filter-orderby border rounded-md">
                        <option {{ request('sort_deadline') == 'asc' ? 'selected' : '' }} value="asc">Fecha vencimiento (asc)</option>
                        <option {{ request('sort_deadline') == 'desc' ? 'selected' : '' }} value="desc">Fecha vencimiento (desc)</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="grid md:grid-cols-2 gap-3 mt-10 ">
            {{--  Listado de tareas  --}}
            @if(!empty($tasks) && count($tasks) > 0)
                @foreach($tasks as $task)
                    <div class="js-task-item flex flex-col gap-y-2 p-4 bg-white rounded-lg" data-task-id="{{ $task->id }}">
                        <div class="flex justify-between items-center">
                            <div class="flex flex-col gap-y-1">
                                <div class="flex items-center gap-x-3">
                                    <h2 class="text-xl font-semibold leading-none text-indigo-600">{{ $task->title }}</h2>
                                </div>
                                <div class="flex sm:hidden items-center gap-x-1 mr-2 text-sm sm:text-base">
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
                                    <span>{{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-y-1 items-end">
                                <div class="flex items-center gap-x-1">
                                    {{--  Fecha de vencimiento de tarea  --}}
                                    <div class="hidden sm:flex items-center gap-x-1 mr-2 text-sm sm:text-base">
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
                                        <span>{{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}</span>
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
                                <form class="js-share-form flex gap-x-1">
                                    <input
                                        type="text"
                                        name="user"
                                        class="js-share-input w-full px-2 border border-gray-300 text-sm sm:text-base rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all"
                                    />
                                    {{--  Compartir tarea  --}}
                                    <x-global.button classnames="bg-indigo-500 hover:bg-indigo-600 !p-1" buttonType="submit">
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
                                </form>
                            </div>
                        </div>
                        <div class="w-full border border-gray-200"></div>
                        <p class="p-2 pt-0 text-sm sm:text-base text-justify">{{ $task->description }}</p>
                        <x-global.button
                            classnames="toggle-status-btn js-toggle-btn w-fit {{$task->status == 'Completada' ? 'completed' : 'pending'}}"
                            size="sm"
                        >
                            {{$task->status}}
                        </x-global.button>
                    </div>
                @endforeach

            @else
                <p class="text-xl font-medium">Actualmente no tienes ninguna tarea creada</p>
            @endif
        </div>
    </div>

{{-- Codigo para actualizar el estado de la tarea  --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.js-toggle-btn').forEach(button => {
                button.addEventListener('click', async function () {
                    const taskId = this.closest('.js-task-item').dataset.taskId;

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

            document.querySelectorAll('.js-share-form').forEach(form => {
                form.addEventListener('submit', async function (e) {
                    e.preventDefault();

                    const taskId = this.closest('.js-task-item').dataset.taskId;
                    const input = this.querySelector('.js-share-input');

                    const body = {
                        email: input.value
                    }

                    const response = await fetch(`/tasks/share/${taskId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(body)
                    });
                })
            })

            document.querySelector('.js-filter-status').addEventListener('change', function (e) {
                const selectedStatus = e.target.value;
                const url = new URL(window.location.href);

                // Set or delete the `status` query parameter
                url.searchParams.set('filter_status', selectedStatus);

                // Refresh page with updated query string
                window.location.href = url.toString();
            });

            document.querySelector('.js-filter-orderby').addEventListener('change', function (e) {
                const selectedStatus = e.target.value;
                const url = new URL(window.location.href);

                // Set or delete the `status` query parameter
                url.searchParams.set('sort_deadline', selectedStatus);

                // Refresh page with updated query string
                window.location.href = url.toString();
            });
        });
    </script>
@endsection
