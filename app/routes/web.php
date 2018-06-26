<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// different ways to pass variables:
// #1
// Route::get('/', function () {
//     return view('welcome', [
//       'name' => 'tester'
//     ]);
// });

// #2
// Route::get('/', function () {
//     return view('welcome')->with(['name'=>'Damian']);
// });

// #3
// Route::get('/', function () {
//     $tasks = [
//       'finish laracasts',
//       'make test projects',
//       'profit'
//     ];
//     return view('welcome', compact('tasks'));
// });

use Illuminate\Support\Facades\DB;

# 4 getting data from db
Route::get('/tasks', function () {
    $tasks = DB::table('tasks')->get();

    // return $tasks; // auto serialized into json

    return view('tasks.index', compact('tasks'));
});

Route::get('/tasks/{task}', function ($id) {
    $task = DB::table('tasks')->find($id);

    return view('tasks.show', compact('task')); // one can also use 'tasks/show'
});
