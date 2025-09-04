<?php

use App\Http\Controllers\AjaxController;
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

Route::match(['get', 'post'], 'ajax/{action}', [AjaxController::class, 'handle']);


Route::get('/', function () {
    return view('website.home');
});

Route::match(['post','get'],'event-deatils',[App\Http\Controllers\EventController::class,'getDataForView']);
Route::match(['post','get'],'/alumni-registration',[App\Http\Controllers\AlumniController::class,'storeByUser'])->name('alumni-registration');
Route::match(['post','get'],'/contribution-deatils',[App\Http\Controllers\ContributionController::class,'contributionDeatils'])->name('contribution-deatils');
Route::get('/alumni-registration-success', function () {
    return view('website.alumnisuccess');
})->name('alumni.success');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('events', App\Http\Controllers\EventController::class);
    Route::resource('alumni', App\Http\Controllers\AlumniController::class)->parameters(['alumni' => 'alumni']);
    Route::match(['get','post','patch'],'/alumni/{alumni}/approve', [App\Http\Controllers\AlumniController::class, 'approve'])
    ->name('alumni.approve');
    Route::resource('contributions', App\Http\Controllers\ContributionController::class);
});

require __DIR__ . '/auth.php';
