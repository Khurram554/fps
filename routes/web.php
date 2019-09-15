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

use Illuminate\Http\Request;

use App\Student;
use App\Bank;

Route::get('/', "StudentController@showAll");

Route::get('/add-student', "StudentController@addStudent");

Route::get("/operation","StudentController@showAll");

Route::get("/student-del/{id}","StudentController@del");

Route::get("/search","StudentController@search");

Route::post("/insertStudent","StudentController@insertStudent");

Route::any("/student-update","StudentController@update");

// Prints

Route::get("/printpage","PrintController@showAll");
Route::get("/print-search","PrintController@printSearch");
Route::any('/printAll', "PrintController@printAll");
Route::get("/print/{id}/{to}/{from}","PrintController@print");


// Bank

Route::get("/bank",function(){
    $data = Bank::all();
    return  View("bank",["data" => $data] );
});

Route::any("/bank-update",function(Request $req){
    $data = Bank::find(1);
    
    $data->name = $req['name'];
    $data->branch = $req['branch'];
    $data->city = $req['city'];
    $data->accno = $req['accno'];

    $data->save();
    return redirect('/bank');
});


//ajax route
Route::get("/get-student-data",function(){
    return $std = Student::all();  
});

