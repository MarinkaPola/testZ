<?php

use App\Http\Controllers\BirdController;
use App\Http\Controllers\NoteController;
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
require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('/birds.birds');
});

Route::get('/', [BirdController::class, 'index']);
Route::get('/birds/{bird}', [BirdController::class, 'show'])->name('birds.show');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/bird/create', [BirdController::class, 'create'])->name('birds.create');
    Route::resource('/birds', BirdController::class)->except(['show', 'index']);

});



