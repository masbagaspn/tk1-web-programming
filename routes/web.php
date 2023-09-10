<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\Upload;

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

Route::get('/', [VideoController::class, 'getVideos']);

Route::get('/{id}', [VideoController::class, 'getVideoById']);

Route::post('/create', [VideoController::class, 'create'])->name('create');

Route::put('/{id}/edit', [VideoController::class, 'update'])->name('update');

Route::delete('/{id}/delete', [VideoController::class, 'delete'])->name('delete');
