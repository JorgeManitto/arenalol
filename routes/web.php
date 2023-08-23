<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\Pages\ItemController;
use App\Http\Controllers\Admin\Pages\SingeryController;
use App\Http\Controllers\Admin\Pages\ArgumentController;
use App\Http\Controllers\Admin\Pages\ChampionController;
use App\Http\Controllers\ChampionsController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Admin\Pages\TierController;
use App\Http\Controllers\WebScrapingController;
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
Route::get('/duo/{id}-{names}', [FrontendController::class,'synergy'])->name('synergy');
Route::get('/solo', [FrontendController::class,'solo'])->name('solo');
Route::get('/arguments', [FrontendController::class,'arguments'])->name('arguments');
Route::get('/champions', [FrontendController::class,'champions'])->name('champions');
Route::get('/champion/{name}', [FrontendController::class,'champion'])->name('champion');

Route::get('/register', function () {
    return redirect('/');
}); 
Route::get('/dashboard', function () {
    return redirect('/');
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


     // START CHAMPIONS
     Route::get('admin/champions',[ChampionController::class,'index'])->name('championPanel');
     Route::get('admin/champion-create',[ChampionController::class,'create'])->name('championCreate');
     Route::post('admin/champion-save',[ChampionController::class,'store'])->name('championSave');
     Route::get('admin/champion-edit/{id}',[ChampionController::class,'edit'])->name('championEdit');
     Route::post('admin/champion-update',[ChampionController::class,'update'])->name('championUpdate');
     Route::post('admin/champion-delete/{id}',[ChampionController::class,'destroy'])->name('championDelete');
 
     // END CHAMPIONS

     Route::get('admin/web-scraping',[WebScrapingController::class,'index'])->name('indexScrapper');

     Route::get('admin/web-scraping/colect-stast-champions',[WebScrapingController::class,'collectStatsData'])->name('colectData');
     Route::get('admin/web-scraping/colect-data-champions', [WebScrapingController::class,'collectDataChampion'])->name('collectDataChampion');
     Route::get('admin/web-scraping/champions', [WebScrapingController::class,'championsColect'])->name('championsColect');

     Route::get('admin/web-scraping/colect-sinergy', [WebScrapingController::class,'scrapeSinergy'])->name('scrapeSinergy');
     Route::get('admin/web-scraping/colect-argument', [WebScrapingController::class,'scrapArgument'])->name('scrapArgument');


     Route::get('admin/web-scraping/lastVersion', [WebScrapingController::class,'lastVersion'])->name('lastVersion');
     Route::get('admin/web-scraping/colect-items',[WebScrapingController::class,'itemsColect'])->name('itemsColect');

     Route::get('admin/web-scraping/test',[WebScrapingController::class,'test'])->name('test');
});