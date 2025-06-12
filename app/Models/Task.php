<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;
    protected $table = 'tasks';

    protected $fillable = ['title', 'description', 'deadline'];

    public function user()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function toggleStatus()
    {
        $this->status = $this->status === 'Completada' ? 'Pendiente' : 'Completada';
        $this->save();

        return $this;
    }

    public static function createTask(string $title, string $description, string $deadline): bool
    {
        $task = new Task();
        $task->title = $title;
        $task->description = $description;
        $task->deadline = $deadline;
        $task->owner_id = Auth::id();

        return $task->save();
    }
}
