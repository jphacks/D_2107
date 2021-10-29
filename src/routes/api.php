<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobExperienceController;
use App\Http\Controllers\SecretController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Log;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    Log::info("rikuesuto");
    Log::info($request);
    return $request->user();
});

Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/get_all_experiences', [JobExperienceController::class, 'getAllExperiences']);
Route::get('/get_businesses', [JobExperienceController::class, 'getBusinesses']);
Route::get('/get_occupations', [JobExperienceController::class, 'getOccupations']);
Route::post('/job_experience/store', [JobExperienceController::class, 'store']);
