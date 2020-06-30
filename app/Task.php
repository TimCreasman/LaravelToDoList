<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * Gets the user associated with the task
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function priority()
    {
        return $this->hasOne(TaskPriority::class);
    }
}
