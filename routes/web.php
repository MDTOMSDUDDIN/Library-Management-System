<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dash<!DOCTYPE html>
board');
    })->name('dashboard');
});


Route::get('/home',[AdminController::class,'index']);
Route::get('/category_page',[AdminController::class,'category_page'])->name('admin.category.page');
Route::post('/add/category',[AdminController::class,'add_category'])->name('admin.add.category');