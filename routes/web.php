<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('home.index');
});
Route::get('add_bill' ,[BillController::class , 'add_bill']);
Route::get('add_product' , [ProductController::class ,'add_product']);
Route::post('insert_product' , [ProductController::class ,'insert_product']);
Route::get('add_bill' ,[ProductController::class , 'show_product']);
Route::get('search' ,[BillController::class , 'search']);
Route::get('add_product_bill/{product_id}' ,[BillController::class , 'add_product_bill']);
Route::post('add_user' , [UserController::class , 'add_user']);
Route::get('old_bill' , [BillController::class , 'old_bill']);
Route::post('retrive_user' , [UserController::class , 'retrive_user']);
Route::get('show_user_bill/{id}' , [UserController::class , 'show_user_bill']);
Route::get('delete_product_from_bill/{product_id}' , [ProductController::class , 'delete_product_from_bill']);
Route::get('delete_user/{user_id}' , [UserController::class , 'delete_user']);
Route::get('edit_product' , [ProductController::class , 'edit_product']);
Route::post('update_product' , [ProductController::class , 'update_product']);
Route::post('insert_updated_product/{id}' , [ProductController::class , 'insert_updated_product']);
Route::get('delete_product' , function(){
    return view('product.delete_product');
});
Route::post('delete_product' , [ProductController::class , 'delete_product']);
Route::get('print_pdf/{id}' , [BillController::class , 'print_pdf'] );
