<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrCalendarController;
use App\Http\Controllers\Hrcalendar;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\StudentCalendarController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\DpHeadConsultationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;



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


//LOGIN AND REGISTER//

Route::get('/',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/',[AuthController::class,'login'])->name('login.submit');
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');

Route::get('/register',[AuthController::class,'registration'])->name('registration');
Route::post('/register',[AuthController::class,'register'])->name('register');


// Student routes
Route::get('/student.student-evaluation-consultation', function () {return view('student.student-evaluation-consultation');
})->middleware('auth')->name('student.student-evaluation-consultation');

//for dashboard


// Student routes
Route::get('/evaluation', function () {
    return view('faculty.index');
})->name('evaluation');


//list of teachers
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/faculty/{department}', [FacultyController::class, 'show']);
Route::get('/evaluation-form', function () {return view('student.evaluation.evaluation-form');})->name('evaluation-form');
Route::post('/evaluation-form', [EvaluationController::class, 'submit'])->name('evaluation.submit');

//studentCalendar
Route::get('/student-calendar', [StudentCalendarController::class, 'index'])->name('student-calendar.index');
Route::get('/studentCalendar/events', [StudentCalendarController::class, 'events'])->name('studentCalendar.events');


Route::get('/consultation', function () {
    return view('student.consultation.student-appoint');
})->name('consultation');

Route::get('/Appointment', function () {
    return view('student.consultation.student-appoint');
})->name('Appointment');

//studentSettings
Route::get('/StudentSettings', function () {
    return view('student.StudentSettings');
})->name('StudentSettings');

// HR routes
Route::get('/hr-db', function () {
    return view('hr.hr-db');
})->middleware('auth')->name('hr-db');

Route::get('/hr-studentlist', function () {
    return view('hr.hr-pick');
})->name('hr-pick');

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
})->middleware('auth')->name('Ct-db');

// routes/web.php
Route::get('/Ct-studentlist', function () {
    return view('AdminCtation.Ct-pick');
})->name('Ct-pick');


Route::get('/Ct-student', function () {
    return view('AdminCtation.Ct-student');
})->name('Ct-student');

Route::get('/Ct-studentHS', function () {
    return view('AdminCtation.Ct-studentHS');
})->name('Ct-studentHS');

// Student List/Course list and Highschool
Route::get('/Consult-bsit', function () {
    return view('AdminCtation.StudentlistinfoCL.Consult-bsit');
})->name('Consult-bsit');

Route::get('/CTHS-G7section', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G7section');
})->name('CTHS-G7section');

Route::get('/CTHS-G8section', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G8section');
})->name('CTHS-G8section');

Route::get('/CTHS-G9section', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G9section');
})->name('CTHS-G9section');

Route::get('/CTHS-G10section', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G10section');
})->name('CTHS-G10section');

Route::get('/CTHS-G11section', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G11section');
})->name('CTHS-G11section');

Route::get('/CTHS-G12section', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G12section');
})->name('CTHS-G12section');


//for section highschool and strand
Route::get('/G7101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-GLEVEL.G7101');
})->name('G7101');

Route::get('/G8101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-GLEVEL.G8101');
})->name('G8101');

Route::get('/G9101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-GLEVEL.G9101');
})->name('G9101');

Route::get('/G10101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-GLEVEL.G10101');
})->name('G10101');

//strand G11
Route::get('/CTHS-G11abm', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.CTHS-G11abm');
})->name('CTHS-G11abm');

Route::get('/CTHS-G11stem', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.CTHS-G11stem');
})->name('CTHS-G11stem');

Route::get('/CTHS-G11gas', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.CTHS-G11gas');
})->name('CTHS-G11gas');

Route::get('/CTHS-G11ict', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.CTHS-G11ict');
})->name('CTHS-G11ict');

Route::get('/G11abm101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.G11abm101');
})->name('G11abm101');

Route::get('/G11stem101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.G11stem101');
})->name('G11stem101');

Route::get('/G11ict101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.G11ict101');
})->name('G11ict101');

Route::get('/G11gas101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.G11gas101');
})->name('G11gas101');

//strang G12
Route::get('/CTHS-G12abm', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.CTHS-G12abm');
})->name('CTHS-G12abm');

Route::get('/CTHS-G12stem', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.CTHS-G12stem');
})->name('CTHS-G12stem');

Route::get('/CTHS-G12gas', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.CTHS-G12gas');
})->name('CTHS-G12gas');

Route::get('/CTHS-G12ict', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.CTHS-G12ict');
})->name('CTHS-G12ict');

Route::get('/G12abm101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.G12abm101');
})->name('G12abm101');

Route::get('/G12stem101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.G12stem101');
})->name('G12stem101');

Route::get('/G12ict101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.G12ict101');
})->name('G12ict101');

Route::get('/G12gas101', function () {
    return view('AdminCtation.StudentlistinfoHS.HS-Strand.G12gas101');
})->name('G12gas101');



// ProfileHS
Route::get('/ProfHS-G7101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfHS-G7101');
})->name('ProfHS-G7101');

Route::get('/ProfHS-G8101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfHS-G8101');
})->name('ProfHS-G8101');

Route::get('/ProfHS-G9101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfHS-G9101');
})->name('ProfHS-G9101');

Route::get('/ProfHS-G10101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfHS-G10101');
})->name('ProfHS-G10101');

//Profle Strand G11
Route::get('/ProfG11-stem101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfG11-stem101');
})->name('ProfG11-stem101');

Route::get('/ProfG11-abm101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfG11-abm101');
})->name('ProfG11-abm101');

Route::get('/ProfG11-gas101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfG11-gas101');
})->name('ProfG11-gas101');

Route::get('/ProfG11-ict101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfG11-ict101');
})->name('ProfG11-ict101');

//Profle Strand G12
Route::get('/ProfG12-stem101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfG12-stem101');
})->name('ProfG12-stem101');

Route::get('/ProfG12-abm101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfG12-abm101');
})->name('ProfG12-abm101');

Route::get('/ProfG12-gas101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfG12-gas101');
})->name('ProfG12-gas101');

Route::get('/ProfG12-ict101', function () {
    return view('AdminCtation.StudentlistinfoHS.ProfileHS.ProfG12-ict101');
})->name('ProfG12-ict101');


//for section college
Route::get('/Consult-bsit101', function () {
    return view('AdminCtation.StudentlistinfoCL.Consult-bsit101');
})->name('Consult-bsit101');

Route::get('/Consult-bsit201', function () {
    return view('AdminCtation.StudentlistinfoCL.Consult-bsit201');
})->name('Consult-bsit201');

Route::get('/Consult-bsit301', function () {
    return view('AdminCtation.StudentlistinfoCL.Consult-bsit301');
})->name('Consult-bsit301');

Route::get('/Consult-bsit401', function () {
    return view('AdminCtation.StudentlistinfoCL.Consult-bsit401');
})->name('Consult-bsit401');

//Profile
Route::get('/Prof-bsit101', function () {
    return view('AdminCtation.StudentlistinfoCL.Profile.Prof-bsit101');
})->name('Prof-bsit101');

Route::get('/Prof-bsit201', function () {
    return view('AdminCtation.StudentlistinfoCL.Profile.Prof-bsit201');
})->name('Prof-bsit201');

Route::get('/Prof-bsit301', function () {
    return view('AdminCtation.StudentlistinfoCL.Profile.Prof-bsit301');
})->name('Prof-bsit301');

Route::get('/Prof-bsit401', function () {
    return view('AdminCtation.StudentlistinfoCL.Profile.Prof-bsit401');
})->name('Prof-bsit401');

//Profile Controller
Route::get('/profile/bsit{level}', [ProfileController::class, 'showProfile'])->name('profile.show');
//

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

//Department Head
Route::get('/DpHead', function () {
    return view('DpHead.DpHead');
})->name('DpHead');
Route::get('/DpHeadAppDis', [DpHeadConsultationController::class, 'index'])->middleware('auth')->name('DpHeadAppDis');