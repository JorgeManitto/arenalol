<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Pages\ItemController;
use App\Http\Controllers\Admin\Pages\SingeryController;
use App\Http\Controllers\Admin\Pages\ArgumentController;
use App\Http\Controllers\ChampionsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\Pages\TierController;
use App\Models\Argument;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [FrontendController::class,'index'])->name('inicio');
Route::get('/arguments', [FrontendController::class,'arguments'])->name('arguments');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/champions', function () {
        return view('champions');
    })->name('champions');

    Route::get('/champion/{name}', [ChampionsController::class,'Champion'])->name('champion');
});
Route::get('admin/login', [AuthController::class,'formLogin'])->name('formLogin');
Route::post('admin/setlogin', [AuthController::class,'login'])->name('setLogin');

Route::middleware(['auth'])->group(function () {
    Route::get('admin',[AdminController::class,'adminPanel'])->name('adminPanel');
    // START ITEMS
    Route::get('admin/items',[ItemController::class,'itemsPanel'])->name('itemsPanel');
    Route::get('admin/item-create',[ItemController::class,'create'])->name('itemCreate');
    Route::post('admin/item-save',[ItemController::class,'save'])->name('itemSave');
    Route::get('admin/item-edit/{id}',[ItemController::class,'edit'])->name('itemEdit');
    Route::post('admin/item-update',[ItemController::class,'update'])->name('itemUpdate');
    Route::post('admin/item-delete/{id}',[ItemController::class,'delete'])->name('itemDelete');

    Route::get('admin/items/colect-items',[ItemController::class,'itemsColect'])->name('itemsColect');
    // END ITEMS

    // START SINERGIES
    Route::get('admin/sinergies',[SingeryController::class,'index'])->name('sinergyPanel');
    Route::get('admin/sinergy-create',[SingeryController::class,'create'])->name('sinergyCreate');
    Route::post('admin/sinergy-save',[SingeryController::class,'store'])->name('sinergySave');
    Route::get('admin/sinergy-edit/{id}',[SingeryController::class,'edit'])->name('sinergyEdit');
    Route::post('admin/sinergy-update',[SingeryController::class,'update'])->name('sinergyUpdate');
    Route::post('admin/sinergy-delete/{id}',[SingeryController::class,'destroy'])->name('sinergyDelete');
    // END ITEMS

    // START ARGUMENT
    Route::get('admin/arguments',[ArgumentController::class,'index'])->name('argumentPanel');
    Route::get('admin/argument-create',[ArgumentController::class,'create'])->name('argumentCreate');
    Route::post('admin/argument-save',[ArgumentController::class,'store'])->name('argumentSave');
    Route::get('admin/argument-edit/{id}',[ArgumentController::class,'edit'])->name('argumentEdit');
    Route::post('admin/argument-update',[ArgumentController::class,'update'])->name('argumentUpdate');
    Route::post('admin/argument-delete/{id}',[ArgumentController::class,'destroy'])->name('argumentDelete');

    Route::get('admin/arguments/colect-arguments',[ArgumentController::class,'colectArguments'])->name('argumentColect');
    // END ARGUMENT


    //START TIER
    Route::get('admin/tiers',[TierController::class,'index'])->name('tierPanel');
    Route::get('admin/tier-create',[TierController::class,'create'])->name('tierCreate');
    Route::post('admin/tier-save',[TierController::class,'store'])->name('tierSave');
    Route::get('admin/tier-edit/{id}',[TierController::class,'edit'])->name('tierEdit');
    Route::post('admin/tier-update',[TierController::class,'update'])->name('tierUpdate');
    Route::post('admin/tier-delete/{id}',[TierController::class,'destroy'])->name('tierDelete');
    // END TIER
});