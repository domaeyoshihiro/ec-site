<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;

Route::get('/', [ShopController::class, 'index']);
Route::get('/thanks', function () {
    return view('/thanks');
})->middleware(['verified']);
Route::get('/search', [ShopController::class, 'search'])->name('search');
Route::get('/detail/{id}', [ShopController::class, 'show']);
Route::post('/reservation/add', [ReservationController::class, 'create'])->name('reservation.create');
Route::post('/edit/{id}', [ReservationController::class, 'update']);
Route::post('/reservation/delete/{id}', [ReservationController::class, 'delete']);
Route::get('/done', function () {
    return view('/done');
});
Route::post('/like/add/{id}', [LikeController::class, 'create']);
Route::post('/like/delete/{id}', [LikeController::class, 'delete']);
Route::get('/mypage/{id}', [UserController::class, 'mypage'])->middleware(['verified']);
Route::get('/review/list/{id}', [ReviewController::class, 'index']);
Route::get('/review/{id}', [ReviewController::class, 'show'])->middleware(['verified']);
Route::post('/review/add', [ReviewController::class, 'create'])->name('review.create');
Route::get('/complete', function () {
    return view('/complete');
});
Route::get('/shop/add', function () {
    return view('shop_add');
});
Route::post('/shop/create', [ShopController::class, 'create'])->name('shop.create');
Route::get('/reservation/detail/{id}', [ReservationController::class, 'show']);
Route::get('/reservation/qrcode', [ReservationController::class, 'qrcode'])->name('qrcode');

Route::post('/reservation/settlement',[ReservationController::class, 'settlement'])->name('settlement');

Route::get('/shop/course/{id}', [ShopController::class, 'course']);
Route::post('/shop/course/add', [ShopController::class, 'courseCreate'])->name('course.create');


Route::post('/payment',[ReservationController::class, 'pay']);


require __DIR__.'/auth.php';
