<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/search',[HomeController::class,'search'])->name('search');
Route::get('/cat_search/{id}',[HomeController::class,'cat_search'])->name('category.search');

Route::get('/',[HomeController::class,'index'])->name('home.page');
Route::get('/book-details/{id}',[HomeController::class,'book_details'])->name('home.book.details');
Route::get('/book-borrow/{id}',[HomeController::class,'borrow_book'])->name('book.borrow');
Route::get('/history/book',[HomeController::class,'book_history'])->name('my.history.book');
Route::get('/request/Cancel/{id}',[HomeController::class,'Cancel_request'])->name('cencel.request.book');

Route::get('/explore',[HomeController::class,'explore'])->name('explode.page');

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


Route::get('/home',[AdminController::class,'index'])->name('admin.home.page')->middleware('admin');;
Route::get('/category_page',[AdminController::class,'category_page'])->name('admin.category.page')->middleware('admin');;
Route::post('/add/category',[AdminController::class,'add_category'])->name('admin.add.category')->middleware('admin');;
Route::get('/category/delete/{id}',[AdminController::class,'Delete_category'])->name('admin.category.Delete')->middleware('admin');;
Route::get('/category/edit/{id}',[AdminController::class,'edit_category'])->name('admin.category.Edit')->middleware('admin');;
Route::post('/category/update/{id}',[AdminController::class,'update_category'])->name('admin.category.update')->middleware('admin');;

Route::get('/add/book',[AdminController::class,'add_book'])->name('add.book')->middleware('admin');
Route::post('/store/book',[AdminController::class,'store_book'])->name('store.book')->middleware('admin');;
Route::get('/show/book',[AdminController::class,'show_book'])->name('show.book')->middleware('admin');;
Route::get('/delete/book/{id}',[AdminController::class,'delete_book'])->name('delete.book')->middleware('admin');;
Route::get('/edit/book/{id}',[AdminController::class,'edit_book'])->name('edit.book')->middleware('admin');;
Route::post('/update/book/{id}',[AdminController::class,'update_book'])->name('update.book')->middleware('admin');;
Route::get('/borrow/request/book',[AdminController::class,'borrow_book'])->name('borrow.book.request')->middleware('admin');;
Route::get('/approved/book/{id}',[AdminController::class,'approve_status'])->name('approved.book.status')->middleware('admin');;
Route::get('/returned/book/{id}',[AdminController::class,'retuened_status'])->name('returned.book.status')->middleware('admin');;
Route::get('/rejected/book/{id}',[AdminController::class,'rejected_status'])->name('rejected.book.status')->middleware('admin');;

