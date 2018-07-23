<?php

namespace App\Http\Controllers;

use App\Task;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::get();
        return view('tasks.index', compact('tasks'));
    }

    // normal fetching a data row
    // public function show($id)
    // {
    //     $task = Task::find($id);
    //     return view('tasks.show', compact('task'));                      // one can also use 'tasks/show'
    // }

    // below we make use of ROUTE MODEL BINDING
    // var in func has to have same name as in web.php!!
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }
}
