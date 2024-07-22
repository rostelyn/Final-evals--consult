<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HrCalendarController;

use App\Http\Controllers\Hrcalendar;

use App\Http\Controllers\FacultyController;
use App\Http\Controllers\EvaluationController;

use App\Http\Controllers\StudentCalendarController;




use App\Http\Controllers\ConsultationController;


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



// Student routes
Route::get('/', function () {return view('student.student-evaluation-consultation');
})->name('student-evaluation');
//for dashboard
Route::get('/student.student-evaluation-consultation
', function () {return view('student.student-evaluation-consultation');
})->name('student-evaluation');
// Student routes

Route::get('/evaluation', function () {
    return view('layouts.evaluation-layout');
})->name('evaluation');
//list of teachers
Route::get('/faculty', [FacultyController::class, 'index']);
Route::get('/faculty/{department}', [FacultyController::class, 'show']);
Route::get('/evaluation-form', function () {return view('student.evaluation.evaluation-form');})->name('evaluation-form');
Route::post('/evaluation-form', [EvaluationController::class, 'submit'])->name('evaluation.submit');

//studentCalendar


Route::get('/student-calendar', [StudentCalendarController::class, 'index'])->name('student-calendar.index');
Route::get('/studentCalendar/events', [StudentCalendarController::class, 'events'])->name('studentCalendar.events');


Route::get('/consultation', function () {
    return view('layouts.studentConsult-layout');
})->name('consultation');
Route::get('/Appointment', function () {
    return view('student.consultation.student-appoint');
})->name('Appointment');

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
//for section
Route::get('/hr-bsit101', function () {
    return view('hr.courseinfo.hr-bsit101');
})->name('hr-bsit101');


Route::get('/hr-bsit201', function () {
    return view('hr.courseinfo.hr-bsit201');
})->name('hr-bsit201');

Route::get('/hr-bsit301', function () {
    return view('hr.courseinfo.hr-bsit301');
})->name('hr-bsit301');

Route::get('/hr-bsit401', function () {
    return view('hr.courseinfo.hr-bsit401');
})->name('hr-bsit401');


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


Route::get('/hr-profile', function () {
    return view('hr.courseinfo.hr-profile');
})->name('hr-profile');




// Consultation routes
Route::get('/Ct-db', function () {
    return view('AdminCtation.Ct-db');
})->name('Ct-db');

Route::get('/Ct-studentlist', function () {
    return view('AdminCtation.Ct-studentlist');
})->name('Ct-studentlist');

Route::get('/Ct-calendar', function () {
    return view('AdminCtation.Ct-calendar');
})->name('Ct-calendar');

Route::get('/Ct-appdis', function () {
    return view('AdminCtation.Ct-appdis');
})->name('Ct-appdis');

Route::get('/Ct-notify', function () {
    return view('AdminCtation.Ct-notify');
})->name('Ct-notify');

Route::get('/Ct-history', function () {
    return view('AdminCtation.Ct-history');
})->name('Ct-history');

Route::get('/Ct-settings', function () {
    return view('AdminCtation.Ct-settings');
})->name('Ct-settings');




//consultation controller

Route::get('/Ct-appdis', [ConsultationController::class, 'index'])->name('Ct-appdis');
Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');

Route::post('/consultations/approve/{id}', [ConsultationController::class, 'approve'])->name('consultations.approve');
Route::post('/consultations/disapprove/{id}', [ConsultationController::class, 'disapprove'])->name('consultations.disapprove');
