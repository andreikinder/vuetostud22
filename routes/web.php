<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/contactsupport', function (\Illuminate\Http\Request $request){


//    return response()->json([
//        'message' => 'message sent. keep calm'
//    ]);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'question' => 'required',
        'verification' => 'required',
    ]);

    return response()->json([
        'message' => 'message sent. keep calm'
    ]);
});


Route::resource('statuses', \App\Http\Controllers\StatusController::class);

Route::get('/testimonials', function (){
   return \App\Models\Testimonial::with('user')->get();
});


Route::get('/questions', function ()  {
   return App\Models\Question::all();
});
