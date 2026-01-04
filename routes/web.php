<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return redirect('/login');
});
Route::middleware(['auth'])->group(function () {
    Route::resource('siswa', SiswaController::class);
}); 

Route::get('/dashboard', function () {
    return redirect('/siswa');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/profile.php';
