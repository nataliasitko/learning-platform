<?php

use App\Http\Controllers\Admin\AdminCtrl;
use App\Http\Controllers\Sets\SetController;
use App\Http\Controllers\UserController;
use App\Http\Requests\CreateSetRequest;
use http\Client\Request;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::get('/',[SetController::class,'showSets'])->name('showSets');

Route::middleware('auth','admin') -> name('admin.') -> prefix('admin')->middleware(['auth', 'password.confirm'])-> group(function(){
    Route::get('/',[AdminCtrl::class,'index'])->name('index'); //admin.index
});

Route::post('/set', function (Request $request) {
    //TODO post set
});

Route::delete('/show/{id}', function ($id) {
    //todo delete set
});

Route::middleware('auth') -> name('sets.') -> prefix('sets') -> group(function(){
    Route::get('/',[SetController::class,'index'])->name('index');
    Route::get('/create',[SetController::class,'create'])->name('create');
    Route::get('/name',[SetController::class,'name'])->name('name');
    Route::post('store', [SetController::class, 'store'])->name('store');
    Route::get('/discover',[SetController::class,'discover'])->name('discover');
    Route::get('/show/',[SetController::class,'show'])->name('show');
});

//Route::middleware('auth') -> name('sets.') -> prefix('sets') -> group(function(){
//    Route::get('/create/{id}',[SetController::class,'create'])->name('create'); //sets.index
//});

Route::middleware('auth') -> name('profiles.') -> prefix('profiles') -> group(function(){
    Route::get('/index',[UserController::class,'index'])->name('index');
    Route::get('/showMyProfile',[UserController::class,'showMyProfile'])->name('showMyProfile');
});


require __DIR__.'/auth.php';
