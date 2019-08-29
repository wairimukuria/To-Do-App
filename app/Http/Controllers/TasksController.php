<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\User;
use DB;

class TasksController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::orderBy('title', 'desc')->get();
        //$tasks = Task::all();
        //return Task::where('title', Task Two');
        //$tasks = DB::select('SELECT * FROM tasks);

        $tasks = Task::orderBy('created_at', 'desc')->paginate(5);
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'note' => 'required'  
        ]);
    
        //Creating a Task
        $task = new Task;
        $task->title = $request->input('title');
        $task->note = $request->input('note');
        $task->user_id =auth()->user()->id;
        $task->save();

        return redirect('/tasks')->with('success', 'Task Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id);
        //Checking for correct user
        if(auth()->user()->id !==$task->user_id){
        return redirect('/tasks')->with('error', 'Permission Denied');
        }
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'note' => 'required'
        ]);

        //Updating a Task
        $task = Task::find($id);
        $task->title = $request->input('title');
        $task->note = $request->input('note');
        $task->save();

        return redirect('/tasks')->with('success', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $task = Task::find($id);

        //Checking for correct user
        if (auth()->user()->id !== $task->user_id) {
            return redirect('/tasks')->with('error', 'Permission Denied');
        }

       $task -> delete();
       return redirect('/tasks')->with('success', 'Task Removed');
    }
}
