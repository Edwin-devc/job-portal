<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\JobApplicationController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    // JobPosting routes
    Route::get('/job-postings', [JobPostingController::class, 'index']);
    Route::post('/job-postings', [JobPostingController::class, 'store']);
    Route::get('/job-postings/{jobPosting}', [JobPostingController::class, 'show']);
    Route::put('/job-postings/{jobPosting}', [JobPostingController::class, 'update']);
    Route::delete('/job-postings/{jobPosting}', [JobPostingController::class, 'destroy']);

    // JobApplication routes
    Route::get('/job-applications', [JobApplicationController::class, 'index']);
    Route::post('/job-applications', [JobApplicationController::class, 'store']);
    Route::get('/job-applications/{jobApplication}', [JobApplicationController::class, 'show']);
    Route::put('/job-applications/{jobApplication}', [JobApplicationController::class, 'update']);
    Route::delete('/job-applications/{jobApplication}', [JobApplicationController::class, 'destroy']);

    // Logout route
    Route::post('/logout', [AuthController::class, 'logout']);
});


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
