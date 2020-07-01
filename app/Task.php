<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    //TODO change when users are added
    protected $attributes = [
        'user_id' => 1
    ];
    protected $fillable = ['description', 'user_id'];

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
    public function priorities()
    {
        return $this->belongsToMany(Priority::class);
    }
}
