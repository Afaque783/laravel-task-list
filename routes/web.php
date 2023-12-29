<?php

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


Route::get('/', function () {
    return view('welcome');
});



Route::get('/hello',function(){
   return 'Hello';
})->name('hello');


Route::get('/hallo',function() {
    return redirect('/hello');
});


Route::get('/hallo',function() {
    return redirect()->route('hello');
});



Route::get('/greet/{name}',function($name) {
    return 'Hello ' . $name . '!';
});


Route::fallback(function () {
    return 'Still got Somewhere!';
});

