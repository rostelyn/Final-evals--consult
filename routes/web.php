<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\EvaluationController;
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




//student
Route::get('/student-evaluation-consultation', function () {
    return view('student.student-evaluation-consultation');
})->name('student-evaluation');

Route::get('/evaluation', function () {
    return view('student.evaluation.layout.app');
})->name('evaluation');


Route::get('/faculty', [FacultyController::class, 'index']);
Route::get('/faculty/{department}', [FacultyController::class, 'show']);

Route::get('/evaluation-form', function () {return view('student.evaluation.evaluation-form');})->name('evaluation-form');

Route::post('/evaluation-form', [EvaluationController::class, 'submit'])->name('evaluation.submit');


Route::get('/consultation', function () {
    return view('student.consultation.layout.app');
})->name('consultation');
