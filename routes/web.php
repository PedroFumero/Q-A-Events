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

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/questions/pendings', [App\Http\Controllers\QuestionController::class, 'pendings'])->name('questions.pendings');

Route::get('/questions/denied', [App\Http\Controllers\QuestionController::class, 'denied'])->name('questions.denied');

Route::put('/question/{question}/approve', [App\Http\Controllers\QuestionController::class, 'approve'])->name('questions.approve');

Route::put('/question/{question}/deny', [App\Http\Controllers\QuestionController::class, 'deny'])->name('questions.deny');

Route::resource('/questions', App\Http\Controllers\QuestionController::class)->only(['create', 'store', 'show']);

Route::post('/questions/{question}/answer', [App\Http\Controllers\QuestionController::class, 'answer'])->name('questions.answer');
