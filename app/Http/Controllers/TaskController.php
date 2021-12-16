<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_date =date('Y-m-d');

        $tasks = Task::all();
        return view('task.index', [
            'tasks' => $tasks,
            'current_date' => $current_date,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'task_description' => 'required',
            'task_assigned_user' => 'required|integer',
            'task_max_ejecution' => 'required',
        ]);

        Task::create([
            'name'=> $request->task_name,
            'description' => $request->task_description,
            'assigned_user' => $request->task_assigned_user,
            'max_ejecution' => $request->task_max_ejecution,
        ]);
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {   
        if($task !=null){

            $breakpoint ="break";

            $logs = $task->logs;
            if(Auth::id() == $task->assigned_user){
                return view('task.show',[
                    'task'=>$task,
                ]);
            }
            else{
                return "Not Permission";
            }
        }
        return "task is null";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //
    }
}
