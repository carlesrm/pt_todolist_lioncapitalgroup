@extends('layouts.root')

@section('title', 'Tareas Compartidas')

<div class="flex justify-between mt-6">
    <h1 class="text-2xl">Lista de tareas compartidas</h1>
</div>
@if(!empty($shared_tasks) && count($shared_tasks) > 0)
    <div class="flex flex-col gap-y-3 mt-3">
        {{--  Listado de tareas  --}}
        @foreach($shared_tasks as $task)
            <div class="js-task-item flex flex-col gap-y-2 p-2 border border-gray-200 rounded-md shadow-md" data-task-id="{{ $task->id }}">
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
                        <div class="flex flex-col items-end gap-x-1">
                            <p class="text-sm sm:text-base"><span class="font-semibold">Dueño:</span> {{ $task->user->email }}</p>
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
                        </div>
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

    </div>
@endif
