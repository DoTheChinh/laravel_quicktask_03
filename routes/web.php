<?php

use App\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('tasks');
});

Route::post('/task', function( Request $request){

});

Route::delete('/task/{task}', function(Task $task){
	 $task->delete();

    return redirect('/');

});
 
 Route::post('/task', function(Request $request){
 	$validator = Validator::make($request->all(),[
 	    'name'=>'required|max:255',]);

 	if($validator->fails()){
 		return redirect('/')
 		        ->withInput()
 		        ->withErrors($validator);
 	}

 	$tasks = new Task;
 	$tasks->name=$request->name;
 	$tasks ->save();
 	return redirect('/');
 });

  Route::get('/',function(){
  	$tasks= Task::orderBy('created_at','asc')->get();
  	return view('tasks',[
  		'tasks'=>$tasks
  	]);
  });
