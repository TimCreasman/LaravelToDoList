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
    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task]);
    }

    /**
     * Renders a form to create a new task
     */
    public function create()
    {
        return view('tasks.create', ['priorities' => TaskPriority::all()]);
    }


    /**
     * Save the submission of a new task
     */
    public function store()
    {
        Task::create($this->validateTask());
        return redirect('/tasks');
    }

    /**
     * Renders a form to edit a task
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task, 'priorities' => TaskPriority::all()]);
    }

    /**
     * Save the submission of an edit to a task
     */
    public function update(Task $task)
    {

        $task->update($this->validateTask());

        return redirect($task->path());

    }

    //Deletes a task
    public function destroy()
    {

    }

    protected function validateTask()
    {
        return request()->validate([
            'description' => 'required',
            'task_priority_id' => 'required'
        ]);
    }

}
