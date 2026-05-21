<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SkillController;
use Illuminate\Support\Facades\Route;

// -----------------------------------------------
// Public Routes (Portfolio)
// -----------------------------------------------
Route::get('/',        [HomeController::class, 'index'])->name('home');
Route::get('/about',   [HomeController::class, 'about'])->name('about');
Route::get('/projects',[HomeController::class, 'projects'])->name('projects');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact',[HomeController::class, 'sendContact'])->name('contact.send');

// -----------------------------------------------
// Admin Routes (dilindungi middleware auth)
// -----------------------------------------------
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Pesan Masuk (Messages)
    Route::get('messages',              [MessageController::class, 'index'])->name('messages.index');
    Route::get('messages/{message}',    [MessageController::class, 'show'])->name('messages.show');
    Route::delete('messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
    Route::patch('messages/{message}/read',   [MessageController::class, 'markRead'])->name('messages.read');
    Route::patch('messages/{message}/unread', [MessageController::class, 'markUnread'])->name('messages.unread');

    // Projects
    Route::resource('projects', ProjectController::class);

    // Skills / Tools
    Route::resource('skills', SkillController::class);

    // About
    Route::get('about',  [AboutController::class, 'index'])->name('about.index');
    Route::patch('about',[AboutController::class, 'update'])->name('about.update');
});

require __DIR__ . '/auth.php';
