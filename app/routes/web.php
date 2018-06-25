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
Route::get('/', function () {
    $tasks = [
      'finish laracasts',
      'make test projects',
      'profit'
    ];
    return view('welcome', compact('tasks'));
});
