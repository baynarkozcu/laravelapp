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



//Product
Route::get('/', 'ProductController@index')->name('product');
 Route::any('productEdit/{uid?}' ,"ProductController@save")->name('productEdit');
 Route::any('productUpdate/{uid?}' , "ProductController@edit")->name('productUpdate');
 Route::any('productDelete/{uid?}' , "ProductController@delete")->name('productDelete');
 Route::any('product/add' , "ProductController@add")->name('productAdd');



//Report
Route::any('reportUpdate/{uid?}' , [ReportController::class, "edit"])->name('reportUpdate');
Route::any('reportDelete/{uid?}' , [ReportController::class, "delete"])->name('reportDelete');
Route::any('report/add' , [ReportController::class, "add"])->name('reportAdd');
Route::any('reportEdit/{uid?}' , [ReportController::class, "save"])->name('reportEdit');
Route::get('report' , [ReportController::class , "index"])->name('report');


//Stock
Route::any('stockUpdate/{uid?}' , "StockController@edit")->name('stockUpdate');
Route::any('stockDelete/{uid?}' , "StockController@delete")->name('stockDelete');
Route::any('stock/add' ,"StockController@add")->name('stockAdd');
Route::any('stockEdit/{uid?}' , "StockController@save")->name('stockEdit');
Route::get('stock' , "StockController@index")->name('stock');


