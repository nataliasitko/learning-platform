<?php

use App\Http\Controllers\Admin\AdminCtrl;
use App\Http\Controllers\SetController;
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

Route::middleware('auth','admin') -> name('sets.') -> prefix('sets') -> group(function(){
    Route::get('/',[AdminCtrl::class,'showSets'])->name('showSets'); //admin.index
});

Route::post('/set', function (Request $request) {
    //TODO post set
});

Route::delete('/set/{id}', function ($id) {
    //todo delete set
});

Route::middleware('auth','admin') -> name('admin.') -> prefix('admin') -> group(function(){
    Route::get('/',[AdminCtrl::class,'index'])->name('index'); //admin.index
});

require __DIR__.'/auth.php';
