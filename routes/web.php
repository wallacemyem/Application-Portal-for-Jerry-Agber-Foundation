<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/apply_job', function () {
        return view('job');
    })->name('job');

    Route::get('/apply_scholarship', function () {
        return view('edu');
    })->name('edu');

    Route::get('/bio_data/{type}/a', [ApplicationController::class, 'index'])->name('bio_edu');

    Route::get('/bio_data/{type}/b', [ApplicationController::class, 'index'])->name('bio_job');

    Route::get('/bio_data/show', [ApplicationController::class, 'show'])->name('show');

    Route::post('/bio_data_job_post', [ApplicationController::class, 'store_job'])->name('bio_job_post');

    Route::post('/bio_data_edu_post', [ApplicationController::class, 'store_edu'])->name('bio_edu_post');
});
