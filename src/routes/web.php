<?php

use Illuminate\Support\Facades\Route;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/JobExperience', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth:web'], function () {
    Route::get('/', function () { return view('welcome'); });

    Route::group(['prefix'=>'job-experience', 'as'=>'jobExperience.'], function () {
        Route::get('/create', [JobExperienceController::class, 'create'])->name('create');
        Route::get('/show', [JobExperienceController::class, 'show'])->name('show');
    });
});
