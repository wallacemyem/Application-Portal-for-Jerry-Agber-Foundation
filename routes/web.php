<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Admin\ApplicantsController;

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
        if (auth()->user()->role_id == 2) {
            return view('dashboard');
        }elseif (auth()->user()->role_id == 1) {
            return view('admin-dash');
        }

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

    Route::get('/bio_data/show/u/{id}', [ApplicationController::class, 'show_user'])->name('show_user');

    Route::post('/bio_data_job_post', [ApplicationController::class, 'store_job'])->name('bio_job_post');

    Route::post('/bio_data_edu_post', [ApplicationController::class, 'store_edu'])->name('bio_edu_post');

    Route::get('/applicant/print/{id}', [ApplicationController::class, 'printView'])->name('applicant.print');

    Route::get('/admin/applicants', [ApplicantsController::class, 'index'])->name('admin.applicants.index');
    Route::get('/admin/applicants/{id}', [ApplicantsController::class, 'show'])->name('admin.applicants.show');
    Route::get('/admin/applicants/{id}/edit', [ApplicantsController::class, 'edit'])->name('admin.applicants.edit');
    Route::put('/admin/applicants/{id}', [ApplicantsController::class, 'update'])->name('admin.applicants.update');
    Route::delete('/admin/applicants/{id}', [ApplicantsController::class, 'destroy'])->name('admin.applicants.destroy');
    Route::get('/admin/applicants/export', [ApplicantsController::class, 'export'])->name('admin.applicants.export');

    Route::post('/update-application-status/{id}', [ApplicationController::class, 'updateStatus'])->name('update.application.status');

});
