<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/ajax-form', function () {
    return view('save-data-with-ajax');
});

Route::get('/save-and-show-image', function () {
    return view('save-and-show-image-with-no-reload');
});

Route::post('correct-the-code', [AssessmentController::class, 'correctCode']);
Route::post('save-image', [AssessmentController::class, 'saveImage']);
