<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\crudController;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::group(['middleware' => 'guest'],function(){
    // create url for user authentication:
    Route::get('/user-registration',[AuthController::class,'register']);    
    Route::post('/user-registration',[AuthController::class,'registerPost']);    
    Route::get('/user-login',[AuthController::class,'login']);    
    Route::post('/user-login',[AuthController::class,'loginPost']); 
});

Route::group(['middleware' => 'auth'],function(){
    Route::get('/',[crudController::class,'showData']);
    Route::get('/add-data',[crudController::class,'addData']);
    Route::post('/store-data',[crudController::class,'storeData']);
    Route::get('/edit-data/{id}',[crudController::class,'editData']);
    Route::post('/update-data/{id}',[crudController::class,'updateData']);
    Route::get('/delete-data/{id}',[crudController::class,'deleteData']);
       
    Route::delete ('/logout',[AuthController::class,'logout']); 
});

   