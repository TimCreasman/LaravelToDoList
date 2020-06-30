<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{
    public function show($taskId)
    {
        return view('tasks.show', ['task' => Task::find($taskId)]);
    }

    public function showList(){
        return view('tasks.list', ['tasks' => Task::all()]);
    }
}
