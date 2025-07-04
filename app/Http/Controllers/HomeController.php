<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Homepage will render a different view based on user type (Guest or Authenticated user)
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function home(Request $request)
    {
        return Auth::check() ? $this->listTasks($request) : view('home');
    }

    /**
     * Homepage render function for authenticated users
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|object
     */
    public function listTasks(Request $request)
    {
        $sort_by_deadline = $request->get('sort_deadline', 'asc');
        $filter_status = $request->get('filter_status', 'Pendiente');

        $tasks = auth()->user()
            ->tasks()
            ->where('status', $filter_status)
            ->orderBy('deadline', $sort_by_deadline)
            ->get();

        $shared_tasks = auth()->user()
            ->sharedTasks()
            ->with('user')
            ->where('status', $filter_status)
            ->orderBy('deadline', $sort_by_deadline)
            ->get();

        return view('dashboard', compact('tasks', 'shared_tasks'));
    }
}
