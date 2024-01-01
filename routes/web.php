<?php

use App\Http\Controllers\ChatController;
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


Route::get('/', function() {
    return 'Chatbot';
});

Route::get('/hapus', [ChatController::class, 'hapusSession'])->name('user.hapusSession');
Route::get('/chat', [ChatController::class, 'index'])->name('user.index');
Route::post('/postchat', [ChatController::class, 'prosesChat'])->name('user.prosesChat');
