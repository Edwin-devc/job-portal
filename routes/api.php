<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\JobApplicationController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// JobPosting routes
Route::get('/job-postings', [JobPostingController::class, 'index'])->middleware('auth:sanctum');
Route::post('/job-postings', [JobPostingController::class, 'store'])->middleware('auth:sanctum');
Route::get('/job-postings/{jobPosting}', [JobPostingController::class, 'show'])->middleware('auth:sanctum');
Route::put('/job-postings/{jobPosting}', [JobPostingController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/job-postings/{jobPosting}', [JobPostingController::class, 'destroy'])->middleware('auth:sanctum');

// JobApplication routes
Route::get('/job-applications', [JobApplicationController::class, 'index'])->middleware('auth:sanctum');
Route::post('/job-applications', [JobApplicationController::class, 'store'])->middleware('auth:sanctum');
Route::get('/job-applications/{jobApplication}', [JobApplicationController::class, 'show'])->middleware('auth:sanctum');
Route::put('/job-applications/{jobApplication}', [JobApplicationController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/job-applications/{jobApplication}', [JobApplicationController::class, 'destroy'])->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
