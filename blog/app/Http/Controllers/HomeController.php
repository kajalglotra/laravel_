<?php

namespace App\Http\Controllers;
use Auth;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Task;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Info;
use Illuminate\Support\MessageBag;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

      public function index3()
      {
        return view('create_post');
      }

    public function __construct()
      {
        $this->middleware('auth');
      }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
      {  
        $infos  = $request->user()->infos()->get(); 
        $tasks = $request->user()->tasks()->paginate(3);
        return view('welcome', ['tasks' => $tasks], ['Infos' => $infos]);
      }
    public function index2(Request $request)
    {
        $id1 = Auth::user()->id;
        $task=new task;
        $task->task=$request->input('names');
        $task->user_id=$id1;
        $task->save();
        return redirect('/home');
    }
    public function delete($id)
     {
        task::findOrFail($id)->delete();
        return redirect()->back();
     }
     public function edit($id,Request $request)
     {
        if ($request->isMethod('post')){
        $change=task::findOrFail($id);
        $change->task =$request->input('names2');
        $change->save();
        return redirect('/home');
     }
      else{
        return view("update_post");
        }
    }
     public function store(Request $request){
        //validate the data 
        $this->validate($request , array(
            'name'    =>'required | max:255',
            'address' =>'required',
            'fon'      => 'required|regex:/^\+?[^a-zA-Z]{5,}$/'
            ));

        $id1 = Auth::user()->id;
        $Info=new Info;
        $Info->name=$request->input('name');
        $Info->user_Id=$id1;
        $Info->address=$request->input('address');
        $Info->fon=$request->input('fon');
        $Info->save();
        return redirect('/home');
     }
     public function ajax1(Request $request){
        $tasks = $request->user()->tasks()->paginate(3);
         foreach ($tasks as $task) {
        echo("<tr><td>$task->task</td><td>$task->id</td>td><a href='/edit/$task->id'><button style='float:right;' class='btn btn-primary'>Edit</button></a></td><td><a href='/delete/$task->id'><input type='button' style='float:right;' class='btn btn-danger' value='Delete'></a></td></tr>");
     }}
}
