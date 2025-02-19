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
Route::get('/category/delete/{id}',[AdminController::class,'Delete_category'])->name('admin.category.Delete');
Route::get('/category/edit/{id}',[AdminController::class,'edit_category'])->name('admin.category.Edit');
Route::post('/category/update/{id}',[AdminController::class,'update_category'])->name('admin.category.update');

Route::get('/add/book',[AdminController::class,'add_book'])->name('add.book');
Route::post('/store/book',[AdminController::class,'store_book'])->name('store.book');
Route::get('/show/book',[AdminController::class,'show_book'])->name('show.book');
Route::get('/delete/book/{id}',[AdminController::class,'delete_book'])->name('delete.book');
Route::get('/edit/book/{id}',[AdminController::class,'edit_book'])->name('edit.book');
Route::post('/update/book/{id}',[AdminController::class,'update_book'])->name('update.book');