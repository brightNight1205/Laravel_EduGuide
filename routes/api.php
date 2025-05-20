<?php

use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('user', UserController::class);
Route::post('/register', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
Route::apiResource('feedback', FeedbackController::class);
Route::apiResource('contact', ContactUsController::class);
Route::apiResource('rating', RatingController::class);
Route::apiResource('university', UniversityController::class);
Route::apiResource('favourite', FavouriteController::class);
Route::apiResource('major', MajorController::class);
Route::get('/university/{id}/majors', [UniversityController::class, 'getMajors']);





