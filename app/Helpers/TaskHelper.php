<?php

namespace App\Helpers;

use App\Models\SharedTask;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskHelper
{
    public static function checkTaskOwnership($taskId, $userId)
    {
        return Task::where('id', $taskId)->where('owner_id', $userId)->count() > 0;
    }

    public static function checkDuplicateSharing($taskId, $userId)
    {
        return SharedTask::where('task_id', $taskId)->where('user_id', $userId)->count() > 0;
    }
}
