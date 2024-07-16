<?php

use Illuminate\Support\Facades\Route;

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
    return view('student.evaluation.evaluation');
})->name('evaluation');

Route::get('/consultation', function () {
    return view('student.consultation');
})->name('consultation');
