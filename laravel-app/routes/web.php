<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LeadController;

// Главная страница с формой обращения и возможностью регистрации/авторизации
Route::get('/', [ContactController::class, 'index'])->name('home');

// Маршрут для отправки формы обращения клиента
Route::post('/contact', [ContactController::class, 'sendContact'])->name('contact.send');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Маршруты для управления лидами
Route::middleware('auth')->group(function () {
    Route::get('/leads', [LeadController::class, 'index'])->name('leads.index');
    Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.updateStatus');
    Route::delete('/leads/{lead}', [LeadController::class, 'destroy'])->name('leads.destroy');
    Route::get('/leads/{lead}/edit', [LeadController::class, 'edit'])->name('leads.edit');
    Route::patch('/leads/{lead}', [LeadController::class, 'update'])->name('leads.update');
});
