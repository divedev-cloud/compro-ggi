<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ── Public site ───────────────────────────────────────────────────────────────

Route::get('/', fn () => view('home'))->name('home');
Route::get('/tentang-kami', fn () => view('tentang-kami'))->name('about');
Route::get('/program', fn () => view('program'))->name('programs');
Route::get('/kontak', fn () => view('kontak'))->name('contact.page');

Route::post('/contact', function (Request $request) {
    $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    return back()->with('success', 'Pesan terkirim! Tim kami akan segera menghubungi Anda.');
})->name('contact.send');

// ── Admin panel ───────────────────────────────────────────────────────────────

Route::prefix('admin-manajemen')->name('admin.')->group(function () {

    // Login (unauthenticated)
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    // Protected routes
    Route::middleware('admin')->group(function () {

        Route::get('/', fn () => redirect()->route('admin.articles.index'));

        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // Image upload for rich text editor
        Route::post('/upload-gambar', [ArticleController::class, 'uploadImage'])->name('upload-image');

        // Articles CRUD
        Route::resource('/artikel', ArticleController::class)
            ->except(['show'])
            ->names('articles')
            ->parameters(['artikel' => 'article']);
    });
});
