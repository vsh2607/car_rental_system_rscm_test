<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RentController;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('/customer')->group(function($route){
    Route::get('/', [CustomerController::class, 'list']);
    Route::get('/add', [CustomerController::class, 'addForm']);
    Route::post('/add', [CustomerController::class, 'addData']);
    Route::get('/{id}/info', [CustomerController::class, 'viewForm']);
    Route::get('/{id}/delete', [CustomerController::class, 'delete']);
    Route::get('/{id}/edit', [CustomerController::class, 'editForm']);
    Route::post('/{id}/edit', [CustomerController::class, 'editData']);


});


Route::prefix('/car')->group(function($route){
    Route::get('/', [CarController::class, 'list']);
    Route::get('/add', [CarController::class, 'addForm']);
    Route::post('/add', [CarController::class, 'addData']);
    Route::get('/{id}/info', [CarController::class, 'viewForm']);
    Route::get('/{id}/delete', [CarController::class, 'delete']);
    Route::get('/{id}/edit', [CarController::class, 'editForm']);
    Route::post('/{id}/edit', [CarController::class, 'editData']);


});


Route::prefix('/rent')->group(function($route){
    Route::get('/', [RentController::class, 'index']);
    Route::post('/add', [RentController::class, 'addData']);
    Route::get("/return", [RentController::class, 'returnForm']);
    Route::get("/return/{id}", [RentController::class, 'returnData']);


});





