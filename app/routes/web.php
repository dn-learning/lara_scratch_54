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

// these 'users' are needed only when not using controller
// use App\Task;
// use App\Http\Controllers\TasksController;
// use Illuminate\Support\Facades\DB;

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


// # 4 getting data from db
// Route::get('/tasks', function () {
//     // $tasks = DB::table('tasks')->get(); // query builder
//     // return $tasks; // auto serialized into json
//     $tasks = Task::get();
//     return view('tasks.index', compact('tasks'));
// });
//
// Route::get('/tasks/{task}', function ($id) {
//     // $task = DB::table('tasks')->find($id); // query builder
//     $task = Task::find($id);
//
//     return view('tasks.show', compact('task')); // one can also use 'tasks/show'
// });

// #5 finally we'll use controllers
// Route::get('/tasks', 'TasksController@index');
// Route::get('/tasks/{task}', 'TasksController@show');

// ep.9 onwards - blog app
Route::get('/', 'PostsController@index');
Route::get('/posts/create', 'PostsController@create');
Route::get('/posts/{post}', 'PostsController@show');
Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post}/comments', 'CommentsController@store');
