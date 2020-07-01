<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Priority;
use \Carbon\Carbon;

class TasksController extends Controller
{

    /**
     * Renders a list of tasks
     */
    public function index()
    {

        $tasks = Task::latest()->get();

        if (request('priority'))
        {

            $tasks = Priority::where('type', request('priority'))->firstOrFail()->tasks;
            return view('tasks.index', ['tasks' => $tasks]);
        }

        //If the user requests to get either completed or incomplete tasks
        $completedRequest = request('completed');
        if ($completedRequest == "true")
        {
            return view('tasks.index', ['tasks' => Task::whereNotNull('completed')->get()]);
        } elseif ($completedRequest == "false")
        {
            return view('tasks.index', ['tasks' => Task::whereNull('completed')->get()]);
        }

        return view('tasks.index', ['tasks' => Task::latest()->get()]);
    }

    /**
     * Renders a single task
     * @param task the task to display
     */
    public function show(Task $task)
    {
        return view('tasks.show', ['task' => $task, 'priorities' => $task->priorities]);
    }

    /**
     * Renders a form to create a new task
     */
    public function create()
    {
        return view('tasks.create', ['priorities' => Priority::all()]);
    }


    /**
     * Save the submission of a new task
     */
    public function store()
    {

        $this->validateTask();

        $task = new Task(request(['description']));
        $task->save();
        $task->priorities()->attach(request('priorities'));
        return redirect('/tasks');
    }

    /**
     * Renders a form to edit a task
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', ['task' => $task, 'priorities' => Priority::all()]);
    }

    /**
     * Save the submission of an edit to a task
     * @param task the task to update
     */
    public function update(Task $task)
    {
        if (request()->completed) { //if the complete checkbox is on
            $task->completed = Carbon::now();
        } else {
            $task->completed = NULL;
        }
        $task->update($this->validateTask());
        $task->priorities()->sync(request('priorities'));
        return redirect($task->path());
    }

    /**
     * Removes a task from the database
     * TODO: consider a soft delete
     * @param task the task to delete
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/tasks');
    }

    public function complete(Task $task)
    {

        $task->completed = Carbon::now();
        $task->save();
        return redirect('/tasks');
    }

    /**
     * Validates the form data received from the frontend
     */
    protected function validateTask()
    {
        return request()->validate([
            'description' => 'required',
            'priorities' => 'exists:priorities,id'
        ]);
    }

}
