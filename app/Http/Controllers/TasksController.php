<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\TaskPriority;

class TasksController extends Controller
{

    /**
     * Renders a list of tasks
     */
    public function index(){
        return view('tasks.index', ['tasks' => Task::latest()->get()]);
    }

    /**
     * Renders a single task
     * @param taskId the id of the task to display
     */
    public function show($taskId)
    {
        return view('tasks.show', ['task' => Task::find($taskId)]);
    }

    //Renders a form to create a new task
    public function create()
    {
        return view('tasks.create', ['priorities' => TaskPriority::all()]);
    }

    //Save the submission of a new task
    public function store()
    {
        $task = new Task();
        $priorityRef = TaskPriority::where('type', request('priority'))->first();

        $task->description = request('description');
        $task->task_priority_id = $priorityRef->id;
        //TODO change when users are implemented
        $task->user_id = 1;

        $task->save();

        return redirect('/tasks');
    }

    //Renders a form to edit a task
    public function edit()
    {
        return view('tasks.edit');
    }

    //Save the submission of an edit to a task
    public function update()
    {

    }

    //Deletes a task
    public function destroy()
    {

    }

}
