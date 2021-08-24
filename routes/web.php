<?php

use App\Http\Controllers\admin\Controller;
use App\Http\Controllers\homeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\user\Controller as UserController;
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

Auth::routes();

Route::get('/', [homeController::class, 'home'])->name('home');
Route::get('/Offer/{id}', [homeController::class, 'ShowOffer'])->name('ShowOffer');

Route::group([
    'prefix' => 'user',
    'as' => 'user.',
    // 'namespace' => 'User',
    'middleware' => ['auth']
], function () {
    Route::post('/favorite/add/offert/{id}', [UserController::class, 'addfavorite'])->name('addfavorite');
    Route::delete('/favorite/offert/{id}', [UserController::class, 'deletefavorite'])->name('deletefavorite');
    Route::get('/favorites', [UserController::class, 'showfavorites'])->name('showfavorites');
    Route::get('/settings/user', [UserController::class, 'settingsuser'])->name('settingsuser');
    Route::patch('/settings/change/user/{id}', [UserController::class, 'settingschange'])->name('settingschange');
    Route::get('/myoffers/user', [UserController::class, 'myoffers'])->name('myoffers');
    Route::get('/email/send', [MailController::class, 'sendMessage'])->name('email');
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
    Route::delete('/delete/viewuser/{id}', [Controller::class, 'deleteViewUser'])->name('deleteViewUser');
    Route::post('/addViewUser', [Controller::class, 'addViewUser'])->name('addViewUser');
    Route::get('/showusers/user/{id}', [Controller::class, 'showuser'])->name('showuser');
});
