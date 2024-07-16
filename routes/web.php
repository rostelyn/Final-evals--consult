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


//HR MAAM CHARM
Route::get('/hr-db', function () {
    return view('hr.hr-db');
})->name('hr-db');

Route::get('/hr-studentlist', function () {
    return view('hr.hr-studentlist');
})->name('hr-studentlist');

Route::get('/hr-calendar', function () {
    return view('hr.hr-calendar');
})->name('hr-calendar');

Route::get('/hr-notify', function () {
    return view('hr.hr-notify');
})->name('hr-notify');

Route::get('/hr-history', function () {
    return view('hr.hr-history');
})->name('hr-history');