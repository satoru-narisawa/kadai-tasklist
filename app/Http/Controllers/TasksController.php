<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;

class TasksController extends Controller
{

    public function index()
    {
        $data = [];
        if (\Auth::check()){
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy("created_at","desc")->paginate(10);
            
            $data = [
                "user" => $user,
                "tasks" => $tasks,
                ];
        }
        
        return view("tasks.index",$data);
    }


    public function create()
    {
        $task = new Task;
         
         return view("tasks.create",[
             "task" => $task,
             ]);
    }


    public function store(Request $request)
    {
        $this->validate($request,[
            "status" => "required|max:10",
            "content" => "required|max:100",
            ]);
            
        $user = \Auth::user();
        
        $task = new Task;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->user_id = $user->id;
        $task->save();
        
        return redirect("/");
    }


    public function show($id)
    {
        $task = Task::find($id);
        
        return view("tasks.show",[
            "task" => $task,
            ]);
    }


    public function edit($id)
    {
        $task = task::find($id);
        
        return view("tasks.edit",[
            "task" => $task,
            ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            "status" => "required|max:10",
            "content" => "required|max:100",
            ]);
        
        $task = task::find($id);
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        
        return redirect("/");
    }


    public function destroy($id)
    {
        $task = task::find($id);
        $task->delete();
        
        return redirect("/");
    }
}
