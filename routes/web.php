<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'registerPost'])->name('register.post');

Route::middleware('auth')->group(function () {
    Route::get('/', [TaskController::class, 'listTask'])->name('home');

    Route::prefix('tasks')->group(function () {
        Route::get('/add', [TaskController::class, 'addTask'])->name('tasks.add');
        Route::post('/add', [TaskController::class, 'addTaskPost'])->name('tasks.add.post');

        Route::get('/update/{task}', [TaskController::class, 'updateTask'])->name('tasks.update');
        Route::post('/update/{task}', [TaskController::class, 'updateTaskPost'])->name('tasks.update.post');

        Route::post('/status/{task}', [TaskController::class, 'updateTaskStatus'])->name('tasks.status');

        Route::get('/delete/{task}', [TaskController::class, 'deleteTask'])->name('tasks.delete');

        Route::post('/share/{task}', [TaskController::class, 'shareTask'])->name('tasks.share');
    });

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
