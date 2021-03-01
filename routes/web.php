<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoadFiles\UploadFileController;
use App\Http\Controllers\LoadFiles\DownloadFileController;

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
    $user = Auth::user();
    $musics = $user->musics;
    return view('dashboard')->with('musics', $musics);
})->middleware(['auth'])->name('dashboard');

Route::get('/upload', [UploadFileController::class,'get'])->name('upload');
Route::post('/upload',[UploadFileController::class,'upload']);

Route::get('/download', [DownloadFileController::class,'get'])->name('download');


require __DIR__.'/auth.php';
