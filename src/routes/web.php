<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DeliveryAddressController;
use App\Http\Controllers\LikeController;

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

//未認証操作
Route::get('/', [ItemController::class, 'index']);
Route::get('/item/{item_id}', [ItemController::class, 'show']);


//認証、初回登録済操作
Route::middleware(['auth', 'first.login'])->group(function(){
    Route::get('/mypage', [MypageController::class, 'show']);
    Route::get('/sell', [SellController::class, 'create']);
    Route::post('/sell', [SellController::class, 'store']);
    Route::post('/sell/image', [SellController::class, 'tempImage']);
    Route::get('/purchase/{item_id}', [PurchaseController::class, 'show']);
    Route::post('/purchase/{item_id}', [PurchaseController::class, 'store']);
    Route::post('/purchase/{item_id}/payment', [PurchaseController::class, 'tempPayment']);
    Route::get('/purchase/address/{item_id}', [DeliveryAddressController::class, 'edit']);
    Route::post('/purchase/address/{item_id}', [DeliveryAddressController::class, 'update']);
});


//認証済操作
Route::middleware('auth')->group(function(){
    Route::get('/mypage/profile', [MypageController::class, 'create']);
    Route::post('/mypage/profile', [MypageController::class, 'store']);
    Route::post('/mypage/profile/image', [MypageController::class, 'tempImage']);
    Route::post('/item/{item_id}/comment', [CommentController::class, 'store']);
    Route::post('/item/{item_id}/like', [LikeController::class, 'store']);
    Route::delete('/item/{item_id}/like', [LikeController::class, 'destroy']);
});
