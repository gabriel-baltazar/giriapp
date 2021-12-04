<?php

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

Route::get('/', [\App\Http\Controllers\GuestController::class, 'index']);
Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create', [\App\Http\Controllers\GiriaController::class, 'newGiria']);
Route::post('/create/register', [\App\Http\Controllers\GiriaController::class, 'createGiria']);

Route::get('/edit/{giriaId}', [\App\Http\Controllers\GiriaController::class, 'editGiria']);
Route::post('/edit/update/{giriaId}', [\App\Http\Controllers\GiriaController::class, 'updateGiria']);

Route::get('/delete/{giriaId}', [\App\Http\Controllers\GiriaController::class, 'deleteGiria']);

Route::post('/create/idiom/register', [\App\Http\Controllers\IdiomController::class, 'createIdiom']);
Route::post('/update/idiom/{idiomId}', [\App\Http\Controllers\IdiomController::class, 'updateIdiom']);
Route::get('/delete/idiom/{idiomId}', [\App\Http\Controllers\IdiomController::class, 'deleteIdiom']);

Route::get('/token', function () {
    return csrf_token(); 
});