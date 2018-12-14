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

/*
    GET /projects (index)
    GET /projects/create (create)
    GET /projects/1 (show)
    POST /projects (store)
    GET /projects/1/edit (edit)
    PATCH /projects/1/ (update)
    DELETE /projects/1 (destroy)
*/


Route::resource('projects', 'ProjectsController');

//Route::resource('projects', 'ProjectsController')->middleware('can:update,project');

Route::post('/projects/{project}/tasks/', 'ProjectTasksController@store');

Route::patch('/tasks/{task}','ProjectTasksController@update');

// Route::get('/projects', 'ProjectsController@index');

// Route::get('/projects/create', 'ProjectsController@create');

// Route::get('/projects/{project}', 'ProjectsController@show');

// Route::post('/projects', 'ProjectsController@store');

// Route::get('/projects/{project}/edit', 'ProjectsController@edit');

// Route::patch('/projects/{project}', 'ProjectsController@update');

// Route::delete('/projects/{project}', 'ProjectsController@destroy');


// Route::get('/', 'PagesController@home');

// Route::get('/about', 'PagesController@about');

// Route::get('/contact', 'PagesController@route');

// Route::get('/', function () {

//     $tasks = [
//         'Go to the store',
//         'Go to the market',
//         'Go to work'``
//     ];

//     //Return Syntax 1
//     return view('welcome',[
//         'tasks' => $tasks,
//         'title' => request('title')
//     ]);

//     //Return Syntax 2
//     //return view('welcome')->withTasks($tasks)->withTitle(request('title'));
    
//     //Return Syntax 3
//     // return view('welcome')->with([
//     //     'tasks' => $tasks,
//     //     'title' => request('title')
//     // ]);


// });

// Route::get('/contact', function() {
//     return view('contact');
// });

// Route::get('/about', function () {
//     return view('about');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
