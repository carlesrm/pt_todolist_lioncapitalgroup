<?php

namespace App\Http\Controllers;

use App\Helpers\TaskHelper;
use App\Models\SharedTask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function listTask()
    {
        $tasks = auth()->user()->tasks()->orderBy('created_at', 'asc')->get();
        $shared_tasks = auth()->user()->sharedTasks()->with('taskOwner')->get();

        return view('dashboard', compact('tasks', 'shared_tasks'));
    }

    public function addTask()
    {
        return view('tasks.add');
    }

    public function addTaskPost(Request $request)
    {
        request()->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $task = Task::createTask($request->title, $request->description, $request->deadline);

        if (!empty($task)) {
            return redirect(route('home'));
        }

        return redirect(route('tasks.add'))->withErrors(['error' => 'Error al crear la tarea']);
    }

    public function updateTask($taskId)
    {
        $task = Task::find($taskId);

        return view('tasks.update', compact('task'));
    }

    public function updateTaskPost($taskId, Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'deadline' => 'required|date',
        ]);

        $task = Task::find($taskId);

        if (!empty($task) && Auth::id() == $task->owner_id) {
            $task->update($validated);

            return redirect()->route('home')->with('success', 'Tarea actualizada correctamente');
        }

        return redirect()->route('home')->withErrors(['error' => 'Error al actualizar la tarea']);
    }

    public function updateTaskStatus($taskId)
    {
        $task = Task::find($taskId);
        $can_toggle_status = SharedTask::where('task_id', $taskId)->where('user_id', Auth::id())->exists() ||
            $task->owner_id == Auth::id();

        if ($task && $can_toggle_status) {
            $updated_task = $task->toggleStatus();

            return response()->json([
                'status' => $updated_task->status,
                'message' => 'Estado de tarea actualizado correctamente',
            ]);
        }

        return response()->json([
            'status' => $task->status,
            'message' => 'Ha ocurrido un error al intentar actualizar la tarea',
        ]);
    }

    public function deleteTask($taskId)
    {
        $task = Task::find($taskId);

        if (!empty($task) && $task->owner_id == Auth::id()) {
            $task->delete();

            return redirect(route('home'))->with('success', 'Tarea eliminada correctamente');
        }

        return redirect(route('home'))->withErrors(['error' => 'Error al eliminar la tarea']);
    }

    public function shareTask($taskId, Request $request)
    {
        $request->validate(['email' => 'required']);

        $user = User::where('email', $request->email)->first();
        $isOwner = Task::where('id', $taskId)->where('owner_id', Auth::id())->exists();

        if (!empty($user) && $isOwner) {
            if (TaskHelper::checkTaskOwnership($taskId, $user->id)) {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'No se puede compartir esta tarea con el propietario',
                ]);
            }

            if (TaskHelper::checkDuplicateSharing($taskId, $user->id)) {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Ya se ha compartido esta tarea con este usuario'
                ]);
            }

            SharedTask::insert([
                'task_id' => $taskId,
                'user_id' => $user->id,
            ]);

            return response()->json([
                'status' => 'ok',
                'msg' => 'Se ha compartido esta tarea correctamente',
            ]);
        }

        return response()->json([
            'status' => 'error',
            'msg' => 'Ha ocurrido un error al intentar compartir esta tarea',
        ]);
    }
}
