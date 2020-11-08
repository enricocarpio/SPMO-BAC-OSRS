<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SupplierController;
use App\Models\Supplier;
use Database\Seeders\AdminSeeder;
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

Route::get('/home', function () {
     if(auth()->user()->is_admin == 1) return redirect()->route('admin.home');
     else return redirect()->route('supplier.home');
});
 
 

Route::group([
    'prefix' => 'supplier',
    'as'     => 'supplier.',
    'namespace' => 'Supplier',
    'middleware' => ['auth','supplier'],
], function() {
    Route::get('/home',[SupplierController::class,'index'])->name('home');
 
    Route::get('/settings',[SupplierController::class, 'settings'])->name('settings');
    Route::post('/settings/{id}',[SupplierController::class, 'settingsStore'])->name('settingsStore');
});


Route::group([
    'prefix' => 'admin',
    'as'     => 'admin.',
    'namespace' => 'Admin',
    'middleware' => ['auth','admin'],
], function() {
    Route::get('/home',[AdminController::class,'index'])->name('home');
    Route::get('/process/supplier/{id?}',[AdminController::class,'processSupplier'])->name('processSupplier');
    Route::post('/process/supplier/{id?}',[AdminController::class,'processSupplierStore'])->name('processSupplierStore');

    Route::get('/process/eligibility/{id}',[AdminController::class,'processEligibility'])->name('processEligibility');
    Route::post('/process/eligibility/{id}',[AdminController::class,'processEligibilityStore'])->name('processEligibilityStore');

    Route::get('/supplier/profile/{id}',[AdminController::class,'supplierProfile'])->name('profile');

    Route::get('/notify/supplier/{id}',[AdminController::class,'notifySupplier'])->name('notifySupplier');

    Route::get('/delete/supplier/{id}',[AdminController::class,'destroySupplier'])->name('destroySupplier');

    Route::get('/settings',[AdminController::class, 'settings'])->name('settings');
    Route::post('/settings/{id}',[AdminController::class, 'settingsStore'])->name('settingsStore');

});


Route::get('/',[HomeController::class, 'home'])->name('clientHome');

Route::get('/white-list',[HomeController::class,'whiteList'])->name('whiteList');
Route::get('/about-us',[HomeController::class,'about'])->name('about');
Route::get('/contact-us',[HomeController::class,'contact'])->name('contact');
Route::get('/become-supplier',[HomeController::class,'becomeSupplier'])->name('becomeSupplier');
Route::post('/become-supplier',[HomeController::class,'becomeSupplierStore'])->name('becomeSupplierStore');


