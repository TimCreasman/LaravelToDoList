<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    //TODO change when users are added
    protected $attributes = [
        'user_id' => 1
    ];
    protected $fillable = ['description', 'task_priority_id', 'user_id'];

    public function path()
    {
        return route('tasks.show', $this);
    }

    /**
     * Gets the user associated with the task
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * Gets the priority associated with the task
    */
    public function priority()
    {
        return $this->hasOne(TaskPriority::class);
    }
}
