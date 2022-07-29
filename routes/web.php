<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mycontroller;
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


//View 
Route::view('/', 'insertRead');

Route::view('/update', 'uploadview');

//handle backend  
Route::get('/', function () {
    return view('welcome');
});
//Post data
Route::post('insertData', [mycontroller::class, 'insert']);
// Get data
Route::get('/', [mycontroller::class, 'readdata']);
//Get data Id
Route::get('updatedelete/{id}', [mycontroller::class, 'updatedelete'])->name('updatedelete');
//Get Data delete
Route::get('delete/{id}', [mycontroller::class, 'deleleproduct'])->name('deleleproduct');
//Update
Route::post('update/{id}', [mycontroller::class, 'editproduct'])->name('editproduct');
//delete
Route::post('delete/{id}', [mycontroller::class, 'deleleproduct'])->name('deleleproduct');
