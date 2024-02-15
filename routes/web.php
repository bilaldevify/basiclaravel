<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSlideController;
use App\Http\Controllers\ProfileController;
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




Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//AdminController Routes
Route::controller(AdminController::class)->group(function(){
Route::get('admin/logout', 'destroy')->name('admin.logout');
Route::get('admin/profile', 'profile')->name('admin.profile');
Route::get('admin/dashboard', 'dashboard')->name('admin.dashboard');
Route::get('edit/profile', 'editProfile')->name('edit.profile');
Route::post('store/profile', 'storeProfile')->name('store.profile');
Route::get('change/profile', 'changePassword')->name('change.password');
Route::post('update/profile', 'UpdatePassword')->name('update.password');


});
//HomeSlide Controller Routes
Route::controller(HomeSlideController::class)->group(function(){
    Route::get('home/slide', 'HomeSlide')->name('home.slide');
    Route::post('update/slide', 'updateSlide')->name('update.profile');
  
    
    });
//AboutSlide Controller Routes
Route::controller(AboutController::class)->group(function(){
    Route::get('about/slide', 'About')->name('about.slide');
    Route::post('update/about', 'UpdateAbout')->name('update.about');
    Route::get('home/about', 'Aboutpage')->name('home.about');
    Route::get('about/multi/images', 'AboutMultiimage')->name('about.multi.image');
    Route::post('store/multiimage', 'storeMultiImage')->name('store.multi.image');
    Route::get('all/multi/images', 'AllMultiimage')->name('all.multi.image');
    Route::get('update/multi/images/{id}', 'UpdateMultiimage')->name('update.multi.image');
    Route::post('update/multiImage', 'UpdateMultiimages')->name('update.image');
    Route::get('delete/multi/images/{id}', 'DeleteMultiimage')->name('delete.image');

   
  
    
    });
require __DIR__.'/auth.php';
