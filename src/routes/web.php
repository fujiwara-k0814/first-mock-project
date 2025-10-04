<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ItemController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\OnboardingController;

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

//商品ページ
Route::get('/', [ItemController::class, 'index'])->middleware('first.login');
Route::get('/item/{item_id}', [ItemController::class, 'show']);


//
Route::middleware(['auth', 'first.login'])->group(function(){
    Route::get('/purchase', [PurchaseController::class, 'purchase']);

});


//初回登録ページ
Route::middleware('auth')->group(function(){
    Route::get('/mypage/profile', [MypageController::class, 'create']);
    Route::post('/mypage/profile', [MypageController::class, 'store']);
    Route::post('/mypage/profile/image', [MypageController::class, 'tempImage']);
});
