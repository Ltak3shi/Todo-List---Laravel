<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Redirect;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where("iscompleted", false)->orderBy("id", "DESC")->get();
        $completed_tasks = Task::where("iscompleted", true)->get();

        return view('welcome', compact("tasks", "completed_tasks"));
    }

    public function store(Request $request)
    {
        $task = new Task();
        $task->task = request("task");
        $task->save();
        
        return redirect::back()->with("message", "Task has been added");
    }

    public function complete($id)
    {
        $task = Task::find($id);
        $task->iscompleted = true;
        $task->save();

        return redirect::back()->with("message", "Task has been added to completed list");
    }

    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect::back()->with("message", "Task has been deleted");
    }
}
