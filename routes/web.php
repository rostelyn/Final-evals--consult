<?php

use Illuminate\Support\Facades\Route;

// Student routes
Route::get('/student-evaluation-consultation', function () {
    return view('student.student-evaluation-consultation');
})->name('student-evaluation');

Route::get('/evaluation', function () {
    return view('student.evaluation.evaluation');
})->name('evaluation');

Route::get('/consultation', function () {
    return view('student.consultation');
})->name('consultation');

// HR routes
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

Route::get('/hr-settings', function () {
    return view('hr.hr-settings');
})->name('hr-settings');

// Consultation routes
Route::get('/Ct-db', function () {
    return view('Consultation.Ct-db');
})->name('Consultation-db');

Route::get('/Ct-studentlist', function () {
    return view('Consultation.Ct-studentlist');
})->name('Ct-studentlist');

Route::get('/Ct-calendar', function () {
    return view('Consultation.Ct-calendar');
})->name('Ct-calendar');

Route::get('/Ct-appdis', function () {
    return view('Consultation.Ct-appdis');
})->name('Ct-appdis');

Route::get('/Ct-notify', function () {
    return view('Consultation.Ct-notify');
})->name('Ct-notify');

Route::get('/Ct-history', function () {
    return view('Consultation.Ct-history');
})->name('Ct-history');

Route::get('/Ct-settings', function () {
    return view('Consultation.Ct-settings');
})->name('Ct-settings');

// Catch-all route for errors or missing pages
Route::fallback(function () {
    return view('errors.404');
});
