<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

// Существующие роуты (оставляем как есть)
Route::get('/', function () {
    return view('welcome');
});

Route::get('/main', function () {
    return view('Main');
});

Route::get('/order', function () {
    return view('Order');
})->name('order');

Route::get('/decoration', function () {
    return view('Decoration');
});

Route::get('/admin', function () {
    return view('Admin');
})->name('admin');

Route::get('/order', function () {
    return view('Order');
})->name('order');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Новые роуты для заявок
Route::post('/application/submit', [ApplicationController::class, 'store'])->name('application.submit');

// СНАЧАЛА роуты профиля, ПОТОМ admin
Route::middleware('auth')->group(function () {
    // Профиль пользователя
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ... существующие роуты ...

// Заявки
Route::post('/application', [ApplicationController::class, 'store'])->name('application.store');

// Админка (любой авторизованный может смотреть)
Route::middleware('auth')->group(function () {
    // Страница Admin.blade.php с заявками
    Route::get('/admin', [ApplicationController::class, 'adminIndex'])->name('admin');
    
    // Обновление статуса заявки
    Route::post('/admin/applications/{id}/status', [ApplicationController::class, 'adminUpdateStatus'])
        ->name('admin.application.updateStatus');
});

require __DIR__.'/auth.php';