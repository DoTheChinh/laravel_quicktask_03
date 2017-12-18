<?php

Route::get('/', function () {
    return view('tasks');
});

/**
 * Add New Task
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]
});
    
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
/**
 * Delete Task
 */
Route::delete('/task/{task}', function (Task $task) {
    //
});
Route::get('/', function () {
    return view('welcome');
});
