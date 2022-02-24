<?php


use Illuminate\Support\Facades\Route;
use Illuminate\support\facades\DB;
use App\Http\controllers\CrudOperation;
use App\Http\controllers\ProductController;
use App\models\User;

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

//getdata
Route::get("/",function () {
    return view("signup");
});

// Route::get("home",[CrudOperation::class,"joinData"]);

Route::get("create",[ProductController::class,"create"]);
Route::get("product/{product}",[ProductController::class,"show"]);

Route::get("home",[CrudOperation::class,"getJoin"]);

Route::get("index",[CrudOperation::class,"getData"]);

Route::get("table",[CrudOperation::class,"getDatatable"]);


Route::get('add', function () {
    return view("add");
});

Route::post("signupdata",[CrudOperation::class,"signupdata"]);

Route::post("add_data",[CrudOperation::class,"addData"]);

Route::get("edit/{id}",[CrudOperation::class,"edit"]);

Route::put('update_data/{id}',[CrudOperation::class,"update"]);

Route::get('search', [CrudOperation::class, 'search']);

Route::delete("delete/{id}",[CrudOperation::class,"delete"]);



