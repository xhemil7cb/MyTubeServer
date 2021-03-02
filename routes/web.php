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

    $musics = Auth::user()->musics()->paginate(5);
   
    return view('dashboard',['musics' => $musics]);

})->middleware(['auth'])->name('dashboard');

Route::get('/upload', [UploadFileController::class,'get'])->middleware('auth')->name('upload');
Route::post('/upload',[UploadFileController::class,'upload'])->middleware('auth');

Route::get('/download', [DownloadFileController::class,'get'])->name('download')->middleware('auth');
Route::get('/download/{filename}',[DownloadFileController::class,'download'])->middleware('auth');


require __DIR__.'/auth.php';
