<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



// give name to Route by using name('Route Name')


// difference between return redirect('/hello'); and return redirect()->route('hello'); 
// is that if we change /hello route to  /xxx then return redirect()->route('hello');  will work properly 
// Fallback Route is behave like a Route when user want to access the wrong route




Route::get('/', function (){
    return redirect()->route('tasks.index');
});



Route::get('/tasks', function ()  {
    return view('index', [
        'tasks' => Task::latest()->get()
    ]);
})->name('tasks.index');



Route::view('/tasks/create', 'create')
    ->name('tasks.create');

Route::get('/tasks/{id}', function($id) {
    
    return view('show', ['task' => Task::findOrFail($id)]);
    
})->name('tasks.show');


Route::post('/tasks', function (Request $request) {
  $data = $request->validate([
    'title' => 'required|max:255',
    'description' => 'required',
    'long_description' => 'required'
  ]);

  $task = new Task;
  $task->title = $data['title'];
  $task->description = $data['description'];
  $task->long_description = $data['long_description'];

  $task->save();

  return redirect()->route('tasks.show', ['id' => $task->id])
        ->with('success', 'Task created successfully!');

})->name('tasks.store');

// Route::get('/hello',function(){
//    return 'Hello';
// })->name('hello');


// Route::get('/hallo',function() {
//     return redirect('/hello');
// });


// Route::get('/hallo',function() {
//     return redirect()->route('hello');
// });



// Route::get('/greet/{name}',function($name) {
//     return 'Hello ' . $name . '!';
// });





Route::fallback(function () {
    return 'Still got Somewhere!';
});

