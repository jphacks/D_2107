<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\JobExperienceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware('auth:sanctum', 'verified')->group(function () {
    Route::get('/index', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
    Route::prefix('job-experience')->group(function () {
        Route::get('/create', [JobExperienceController::class, 'create'])->name('create');
        Route::get('/show', [JobExperienceController::class, 'show'])->name('show');
    });
    Route::get('/get_all_experiences', [JobExperienceController::class, 'getAllExperiences']);
    Route::get('/get_businesses', [JobExperienceController::class, 'getBusinesses']);
    Route::get('/get_occupations', [JobExperienceController::class, 'getOccupations']);
    Route::post('/job_experience/store', [JobExperienceController::class, 'store']);

    Route::get('/user', function (Request $request) {
        Log::info("rikuesutoo");
        Log::info(\Auth::user());
        return \Auth::user();
    });
});
