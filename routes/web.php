<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('home');
});

Route::post('/contact', function (Request $request) {
    $request->validate([
        'name'    => 'required|string|max:255',
        'email'   => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // TODO: kirim email atau simpan ke database
    return back()->with('success', 'Pesan terkirim! Tim kami akan segera menghubungi Anda.');
})->name('contact.send');
