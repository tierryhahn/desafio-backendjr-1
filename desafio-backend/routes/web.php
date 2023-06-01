<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;

Route::get('/', [SaleController::class,'index'])->name('upload');
Route::post('/', [SaleController::class,'upload_csv_records']);
Route::get('/sales/json', [SaleController::class, 'getJsonData'])->name('sales.json');
