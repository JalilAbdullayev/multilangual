<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\SetLocale;
use App\Models\PostTranslate;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

$locale = Request::segment(1);

if(in_array($locale, ['az', 'ru'])) {
    $locale = Request::segment(1);
} else {
    $locale = '';
}

Route::group(['prefix' => $locale, function($locale = null) {
    return $locale;
}, 'where' => ['locale' => '[a-zA-Z]{2}'], 'middleware' => SetLocale::class], function() {
    Route::controller(PostController::class)->group(function() {
        Route::get('/', 'index');
        Route::get('post/{slug}', 'post')->name('post_en');
        Route::get('meqale/{slug}', 'post')->name('post_az');
        Route::get('skadka/{slug}', 'post')->name('post_ru');
    });
});

Route::get('/dashboard', function() {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
