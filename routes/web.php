<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\DownloadPdfController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductRecordSheetController;
use App\Http\Controllers\StripeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Route::get('/store', [CartController::class, 'index'])->name('store');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add_to_cart');
Route::patch('update-cart', [CartController::class, 'update'])->name('update_cart');
Route::delete('remove-from-cart', [CartController::class, 'remove'])->name('remove_from_cart');

Route::post('/session', [StripeController::class, 'session'])->name('session');
Route::get('/success', [StripeController::class, 'success'])->name('success');
Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');

Route::prefix('report')->group(function () {
    Route::get('/sales/{record}', [DownloadPdfController::class, 'downloadSale'])->name('sale.pdf.download');
    Route::get('/purchases/{record}', [DownloadPdfController::class, 'downloadPurchase'])->name('purchase.pdf.download');
});

Route::get('/product-record-sheets/{record}/pdf', [ProductRecordSheetController::class, 'downloadProductRecordSheet'])->name('productRecordSheet.pdf.download');
Route::get('/products/excel', [ProductController::class, 'downloadExcel'])->name('products.excel.download');
Route::get('/products/pdf', [ProductController::class, 'downloadPdf'])->name('products.pdf.download');
