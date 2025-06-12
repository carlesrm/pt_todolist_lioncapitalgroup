<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SharedTask extends Pivot
{
    protected $table = 'shared_tasks';

    // Add any fillable or guarded fields
    protected $fillable = ['task_id', 'user_id'];

    public $timestamps = false; // unless your table has created_at/updated_at
}
