<?php

use App\Http\Controllers\admin\Controller;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

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

Auth::routes();

Route::get('/', homeController::class)->name('home');

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    // 'namespace' => 'User',
    'middleware' => ['auth']
], function () {

});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    // 'namespace' => 'Admin',
    'middleware' => ['auth', 'admin']
], function () {
    Route::get('/dashboard', [Controller::class, 'dashboard'])->name('dashboard');
    Route::get('/addoffer', [Controller::class, 'addOffer'])->name('addoffer');
    Route::get('/showusers', [Controller::class, 'showUsers'])->name('showusers');
    Route::get('/viewusers', [Controller::class, 'viewUsers'])->name('viewusers');
    Route::get('/offer/{id}', [Controller::class, 'viewOffer'])->name('offer');
    Route::delete('/delete/offer/{id}', [Controller::class, 'deleteOffer'])->name('deleteOffer');
    Route::get('/edit/offer/{id}', [Controller::class, 'editOffer'])->name('editOffer');
    Route::patch('/save/viewuser/{id}', [Controller::class, 'updateView'])->name('updateView');
    Route::delete('/delete/viewuser/{id}',[Controller::class,'deleteViewUser'])->name('deleteViewUser');
});
