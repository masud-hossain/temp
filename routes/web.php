<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ThanaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboadController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\SupplierController;

Route::middleware('guest')->group(function() {
    Route::get('/',[AuthController::class, 'index'])->name('login');
    Route::post('/login',[AuthController::class, 'login']);
});
Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboadController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/profile',[ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/show',[ProfileController::class, 'show']);
    Route::post('/profile/update',[ProfileController::class, 'update']);

    Route::get('/information',[InfoController::class, 'index'])->name('info');
    Route::get('/information/show',[InfoController::class, 'show']);
    Route::post('/information/update',[InfoController::class, 'update']);

    Route::get('/district',[DistrictController::class, 'index'])->name('district');
    Route::post('/district/create',[DistrictController::class, 'create']);
    Route::put('/district/update/{id}',[DistrictController::class, 'update']);
    Route::post('/district/delete',[DistrictController::class, 'delete']);
    Route::get('/district/pagination',[DistrictController::class, 'pagination']);
    Route::get('/district/search',[DistrictController::class, 'search']);

    Route::get('/thana',[ThanaController::class, 'index'])->name('thana');
    Route::post('/thana/create',[ThanaController::class, 'create']);
    Route::put('/thana/update/{id}',[ThanaController::class, 'update']);
    Route::post('/thana/delete',[ThanaController::class, 'delete']);
    Route::get('/thana/pagination',[ThanaController::class, 'pagination']);
    Route::get('/thana/search',[ThanaController::class, 'search']);

    Route::get('/supplier',[SupplierController::class, 'index'])->name('supplier');
    Route::get('/supplier/show/thana',[SupplierController::class, 'showThana']);
    Route::post('/supplier/create',[SupplierController::class, 'create']);
    Route::put('/supplier/update/{id}',[SupplierController::class, 'update']);
    Route::post('/supplier/delete',[SupplierController::class, 'delete']);
    Route::get('/supplier/pagination',[SupplierController::class, 'pagination']);
    Route::get('/supplier/search',[SupplierController::class, 'search']);



});
