<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/**
* タスクダッシュボード表示
*/
Route::get('/', function () {
    return view('tasks');
});

/**
 * タスク追加
 */
Route::post('/task', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
        ->withInput()
        ->withErrors($validator);
    }

$task = new Task;
$task->name = $request->name;
$task->save();

return redirect('/');
});

/**
 * タスク削除
 */
Route::delete('/task/{task}', function (Task $task) {
    //
});