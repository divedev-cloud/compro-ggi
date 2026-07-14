<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\ArticleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// ── Public site ───────────────────────────────────────────────────────────────

Route::get('/', fn () => view('home'))->name('home');
Route::get('/tentang-kami', fn () => view('tentang-kami'))->name('about');
Route::get('/program', fn () => view('program'))->name('programs');
Route::get('/kontak', fn () => view('kontak'))->name('contact.page');
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index']);

Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');
Route::get('/artikel/kategori/{slug}', [ArticleController::class, 'category'])->name('artikel.category');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.show');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name'    => 'required|string|max:255',
        'org'     => 'nullable|string|max:255',
        'email'   => 'required|email|max:255',
        'phone'   => 'nullable|string|max:255',
        'topic'   => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    \App\Models\Contact::create($validated);

    if ($request->wantsJson() || $request->ajax()) {
        return response()->json(['message' => 'Pesan terkirim! Tim kami akan segera menghubungi Anda.']);
    }

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
        Route::post('/upload-gambar', [AdminArticleController::class, 'uploadImage'])->name('upload-image');

        // Articles CRUD
        Route::resource('/artikel', AdminArticleController::class)
            ->except(['show'])
            ->names('articles')
            ->parameters(['artikel' => 'article']);

        // User management (superadmin only — enforced in controller)
        Route::resource('/pengguna', AdminUserController::class)
            ->only(['index', 'create', 'store', 'edit', 'update'])
            ->names('users')
            ->parameters(['pengguna' => 'user']);
        Route::patch('/pengguna/{user}/toggle', [AdminUserController::class, 'toggle'])
            ->name('users.toggle');

        // Contact Management
        Route::resource('/kontak', \App\Http\Controllers\Admin\ContactController::class)
            ->only(['index', 'show', 'update', 'destroy'])
            ->names('contacts')
            ->parameters(['kontak' => 'contact']);
    });
});
