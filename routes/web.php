<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HrCalendarController;

use App\Http\Controllers\Hrcalendar;

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

// Student route
Route::get('/', function () {
    return view('student.student-evaluation-consultation');
})->name('student-evaluation');
//for dashboard
Route::get('/student.student-evaluation-consultation
', function () {return view('student.student-evaluation-consultation');
})->name('student-evaluation');
// Student routes

Route::get('/evaluation', function () {
    return view('layouts.evaluation-layout');
})->name('evaluation');

Route::get('/faculty', [FacultyController::class, 'index']);
Route::get('/faculty/{department}', [FacultyController::class, 'show']);
Route::get('/evaluation-form', function () {return view('student.evaluation.evaluation-form');})->name('evaluation-form');
Route::post('/evaluation-form', [EvaluationController::class, 'submit'])->name('evaluation.submit');


Route::get('/consultation', function () {
    return view('student.consultation.');
})->name('consultation');


Route::get('/consultation', function () {
    return view('student.consultation.student-appoint');
})->name('consultation');


// HR routes

Route::get('/hr-db', function () {
    return view('hr.hr-db');
})->name('hr-db');




Route::get('/hr-studentlist', function () {
    return view('hr.hr-studentlist');
})->name('hr-studentlist');

Route::get('/hr-bsit', function () {
    return view('hr.courseinfo.hr-bsit');
})->name('hr-bsit');

Route::get('/hr-bsit101', function () {
    return view('hr.courseinfo.hr-bsit101');
})->name('hr-bsit101');






Route::get('/hr-calendar', function () {
    return view('hr.hr-calendar');
})->name('hr-calendar');

Route::get('/hr-notify', function () {
    return view('hr.hr-notify');
})->name('hr-notify');

Route::get('/hr-history', function () {
    return view('hr.hr-history');
})->name('hr-history');

Route::get('/hr-settings', function () {
    return view('hr.hr-settings');
})->name('hr-settings');


Route::get('/hr-sidebar', function () {
    return view('hr.hr-sidebar');
})->name('hr.hr-db');

Route::get('/hrcalendars', [HrCalendarController::class, 'index']);
Route::post('/hrcalendars', [HrCalendarController::class, 'store']);

// Consultation routes
Route::get('/Ct-db', function () {
    return view('StudentConsult.Ct-db');
})->name('Ct-db');

Route::get('/Ct-studentlist', function () {
    return view('StudentConsult.Ct-studentlist');
})->name('Ct-studentlist');

Route::get('/Ct-calendar', function () {
    return view('StudentConsult.Ct-calendar');
})->name('Ct-calendar');

Route::get('/Ct-appdis', function () {
    return view('StudentConsult.Ct-appdis');
})->name('Ct-appdis');

Route::get('/Ct-notify', function () {
    return view('StudentConsult.Ct-notify');
})->name('Ct-notify');

Route::get('/Ct-history', function () {
    return view('CStudentConsult.Ct-history');
})->name('Ct-history');

Route::get('/Ct-settings', function () {
    return view('StudentConsult.Ct-settings');
})->name('Ct-settings');


// Catch-all route for errors or missing pages
Route::fallback(function () {
    return view('errors.404');
});