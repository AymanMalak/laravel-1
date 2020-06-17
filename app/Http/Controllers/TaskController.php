<?php

namespace App\Http\Controllers;

use App\Mail\StatuseMail;
use App\Mail\WelcomeMail;
use App\Task;
use App\User;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    // public function __construct(){
    //     $this->middleware('userauth');
    // }

    /**
     *
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth= Auth::user()->id;
        $tasks= Task::where('user_id','=', $auth )->get();
        // if(session()->has('locale')) {
        //     App::setLocale(session()->get('locale'));
        // }
        return view('tasks.index',[
            'tasks'=>$tasks
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::select('id','name')->get();
        return view('tasks.create',[
            'users'=>$users
        ]);
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
            'name' => 'required|string|max:100',
            'desc' => 'required|string',
            'status' => 'required',
            'user_id'=>'required|exists:users,id',
            'deadline'=>'required|date',
        ]);

        Task::create([
            'name'=>$request->name,
            'desc'=>$request->desc,
            'status'=>$request->status,
            'deadline'=>$request->deadline,
            'user_id'=>$request->user_id,
        ]);

        // send email to task owner
        $x= User::select('email')->where('id','=',$request->user_id)->get();
        Mail::to($x)->send(new WelcomeMail);

        return redirect( route('tasks.index') );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tasks = Task::where('id','=',$id)->get();
            return view('tasks.show',[
            'tasks'=>$tasks
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task= Task::find($id);
        $users = User::get();
        return view('tasks.edit',[
            'task'=>$task,
            'users'=>$users
        ]);
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
        $request->validate([
            'name' => 'required|string|max:100',
            'desc' => 'required|string',
            'status' => 'required',
            'user_id'=>'required|exists:users,id',
            'deadline'=>'required|date'
        ]);

        $tasks= Task::find($id);
        //old status
        $oldstatus=  $tasks->status;
        //old email
        $oldemail=  $tasks->user_id;

        $tasks->update([
            'name'=>$request->name,
            'desc'=>$request->desc,
            'status'=>$request->status,
            'deadline'=>$request->deadline,
            'user_id'=>$request->user_id,
        ]);
        // new status after edit
        $newstatus = $tasks->status;
        // new mail after edited
        $newemail = $tasks->user_id;
        if($newstatus != $oldstatus){
            // if status changed send email
            $x= User::select('email')->where('id','=',$request->user_id)->get();
            Mail::to($x)->send(new StatuseMail);
            if( $oldemail != $newemail ){
                // if email is changed send message to new owner
                $x= User::select('email')->where('id','=',$request->user_id)->get();
                Mail::to($x)->send(new WelcomeMail);
            }
        }
        return redirect(route('tasks.index'));
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
        $task->delete();
        return back();
    }
}
