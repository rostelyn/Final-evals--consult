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
Route::get('/studeHrCalendar', [StudentCalendarController::class, 'index'])->name('studeHrCalendar.index');
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
Route::get('/HrDashboard', function () {
    return view('hr.HrDashboard');
})->middleware('auth')->name('HrDashboard');

Route::get('/HrStudentList', function () {
    return view('hr.HrStudentList');
})->name('HrStudentList');

Route::get('/HrBSIT', function () {
    return view('hr.HrCollege.HrBSIT');
})->name('HrBSIT');

Route::get('/HrCollegeCourse', function () {
    return view('hr.HrCollegeCourse');
})->name('HrCollegeCourse');

//for section
Route::get('/HrBSIT101', function () {
    return view('hr.HrCollege.HrBSIT101');
})->name('HrBSIT101');


Route::get('/HrBSIT201', function () {
    return view('hr.HrCollege.HrBSIT201');
})->name('HrBSIT201');

Route::get('/HrBSIT301', function () {
    return view('hr.HrCollege.HrBSIT301');
})->name('HrBSIT301');

Route::get('/HrBSIT401', function () {
    return view('hr.HrCollege.HrBSIT401');
})->name('HrBSIT401');


// HR High School Route

Route::get('/HrHighSchool', function () {
    return view('hr.HrHighSchool');
})->name('HrHighSchool');



//for section highschool and strand
Route::get('/GRADE7-101', function () {
    return view('hr.HRHighSchool.VIEWSTUDENT.GRADE7-101');
})->name('GRADE7-101');

Route::get('/GRADE8-101', function () {
    return view('hr.HRHighSchool.VIEWSTUDENT.GRADE8-101');
})->name('GRADE8-101');

Route::get('/GRADE9-101', function () {
    return view('hr.HRHighSchool.VIEWSTUDENT.GRADE9-101');
})->name('GRADE9-101');

Route::get('/GRADE10-101', function () {
    return view('hr.HRHighSchool.VIEWSTUDENT.GRADE10-101');
})->name('GRADE10-101');

//strand G11
Route::get('/Grade11Abm', function () {
    return view('hr.HRHighSchool.11STRANDSECTION.11ABM.Grade11Abm');
})->name('Grade11Abm');

Route::get('/Grade11Stem', function () {
    return view('hr.HRHighSchool.11STRANDSECTION.11STEM.Grade11Stem');
})->name('Grade11Stem');

Route::get('/Grade11Gas', function () {
    return view('hr.HRHighSchool.11GAS.Grade11Gas');
})->name('Grade11Gas');

Route::get('/hrHS-G11ict', function () {
    return view('hr.HRHighSchool.STRAND.hrHS-G11ict');
})->name('hrHS-G11ict');

Route::get('/hrHS-G11gas', function () {
    return view('hr.HRHighSchool.STRAND.hrHS-G11gas');
})->name('hrHS-G11gas');

Route::get('/hrG11abm101', function () {
    return view('hr.HRHighSchool.STRAND.hrG11abm101');
})->name('hrG11abm101');

Route::get('/hrG11stem101', function () {
    return view('hr.HRHighSchool.STRAND.hrG11stem101');
})->name('hrG11stem101');

Route::get('/hrG11ict101', function () {
    return view('hr.HRHighSchool.STRAND.hrG11ict101');
})->name('hrG11ict101');

Route::get('/hrG11gas101', function () {
    return view('hr.HRHighSchool.STRAND.hrG11gas101');
})->name('hrG11gas101');

//strand G12
Route::get('/hrHS-G12abm', function () {
    return view('hr.HRHighSchool.STRAND.hrHS-G12abm');
})->name('hrHS-G12abm');

Route::get('/hrHS-G12stem', function () {
    return view('hr.HRHighSchool.STRAND.hrHS-G12stem');
})->name('hrHS-G12stem');

Route::get('/hrHS-G12gas', function () {
    return view('hr.HRHighSchool.STRAND.hrHS-G12gas');
})->name('hrHS-G12gas');

Route::get('/hrHS-G12ict', function () {
    return view('hr.HRHighSchool.STRAND.hrHS-G12ict');
})->name('hrHS-G12ict');

Route::get('/12ABM-101', function () {
    return view('hr.HRHighSchool.STRAND.12ABM-101');
})->name('12ABM-101');

Route::get('/hrG12stem101', function () {
    return view('hr.HRHighSchool.STRAND.hrG12stem101');
})->name('hrG12stem101');

Route::get('/hrG12ict101', function () {
    return view('hr.HRHighSchool.STRAND.hrG12ict101');
})->name('hrG12ict101');

Route::get('/hrG12gas101', function () {
    return view('hr.HRHighSchool.STRAND.hrG12gas101');
})->name('hrG12gas101');



// ProfileHS
Route::get('/GRADE7PROFILE', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE7PROFILE');
})->name('GRADE7PROFILE');

Route::get('/hrProfHS-G8101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfHS-G8101');
})->name('hrProfHS-G8101');

Route::get('/hrProfHS-G9101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfHS-G9101');
})->name('hrProfHS-G9101');

Route::get('/hrProfHS-G10101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfHS-G10101');
})->name('hrProfHS-G10101');

//Profle Strand G11
Route::get('/hrProfG11-stem101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfG11-stem101');
})->name('hrProfG11-stem101');

Route::get('/hrProfG11-abm101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfG11-abm101');
})->name('hrProfG11-abm101');

Route::get('/hrProfG11-gas101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfG11-gas101');
})->name('hrProfG11-gas101');

Route::get('/hrProfG11-ict101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfG11-ict101');
})->name('hrProfG11-ict101');

//Profle Strand G12
Route::get('/hrProfG12-stem101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfG12-stem101');
})->name('hrProfG12-stem101');

Route::get('/hrProfG12-abm101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfG12-abm101');
})->name('hrProfG12-abm101');

Route::get('/hrProfG12-gas101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfG12-gas101');
})->name('hrProfG12-gas101');

Route::get('/hrProfG12-ict101', function () {
    return view('hr.HRHighSchool.HSPROFILE.hrProfG12-ict101');
})->name('hrProfG12-ict101');

//
Route::get('/HrCalendar', function () {
    return view('hr.HrCalendar');
})->name('HrCalendar');

Route::get('/HrNotification', function () {
    return view('hr.HrNotification');
})->name('HrNotification');

Route::get('/HrSettings', function () {
    return view('hr.HrSettings');
})->name('HrSettings');


Route::get('/hr-sidebar', function () {
    return view('hr.hr-sidebar');
})->name('hr.HrDashboard');

Route::get('/HrCalendars', [HrCalendarController::class, 'index']);
Route::post('/HrCalendars', [HrCalendarController::class, 'store']);


Route::get('/HrProfile', function () {
    return view('hr.HrCollege.HrProfile');
})->name('HrProfile');



// Consultation routes
Route::get('/Ct-db', function () {
    return view('AdminCtation.Ct-db');
})->middleware('auth')->name('Ct-db');

// routes/web.php

Route::get('/Ct-studentlist', function () {
    return view('AdminCtation.Ct-studentlist');
})->name('Ct-studentlist');

Route::get('/Ct-student', function () {
    return view('AdminCtation.Ct-student');
})->name('Ct-student');


Route::get('/Ct-calendar', function () {
    return view('AdminCtation.Ct-calendar');
})->name('Ct-calendar');


Route::get('/Ct-studentHS', function () {
    return view('AdminCtation.Ct-studentHS');
})->name('Ct-studentHS');

// Student List/Course list and Highschool
Route::get('/Consult-bsit', function () {
    return view('AdminCtation.StudentlistinfoCL.Consult-bsit');
})->name('Consult-bsit');


//highschool route
Route::get('/CTHS-G7level', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G7level');
})->name('CTHS-G7level');

Route::get('/CTHS-G8level', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G8level');
})->name('CTHS-G8level');

Route::get('/CTHS-G9level', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G9level');
})->name('CTHS-G9level');

Route::get('/CTHS-G10level', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G10level');
})->name('CTHS-G10level');

Route::get('/CTHS-G11level', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G11level');
})->name('CTHS-G11level');

Route::get('/CTHS-G12level', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G12level');
})->name('CTHS-G12level');


//for section highschool and strand
Route::get('/CtG7101-section', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-GLEVEL.CtG7101-section');
})->name('CtG7101-section');

Route::get('/CtG8101-section', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-GLEVEL.CtG8101-section');
})->name('CtG8101-section');

Route::get('/CtG9101-section', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-GLEVEL.CtG9101-section');
})->name('CtG9101-section');

Route::get('/CtG10101-section', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-GLEVEL.CtG10101-section');
})->name('CtG10101-section');

//strand G11
Route::get('/CTHS-G11abm', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTHS-G11abm');
})->name('CTHS-G11abm');

Route::get('/CTHS-G11stem', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTHS-G11stem');
})->name('CTHS-G11stem');

Route::get('/CTHS-G11gas', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTHS-G11gas');
})->name('CTHS-G11gas');

Route::get('/CTHS-G11ict', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTHS-G11ict');
})->name('CTHS-G11ict');

Route::get('/G11abm101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.G11abm101');
})->name('G11abm101');

Route::get('/G11stem101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.G11stem101');
})->name('G11stem101');

Route::get('/G11ict101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.G11ict101');
})->name('G11ict101');

Route::get('/G11gas101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.G11gas101');
})->name('G11gas101');

//strang G12
Route::get('/CTHS-G12abm', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTHS-G12abm');
})->name('CTHS-G12abm');

Route::get('/CTHS-G12stem', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTHS-G12stem');
})->name('CTHS-G12stem');

Route::get('/CTHS-G12gas', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTHS-G12gas');
})->name('CTHS-G12gas');

Route::get('/CTHS-G12ict', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTHS-G12ict');
})->name('CTHS-G12ict');

Route::get('/G12abm101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.G12abm101');
})->name('G12abm101');

Route::get('/G12stem101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.G12stem101');
})->name('G12stem101');

Route::get('/G12ict101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.G12ict101');
})->name('G12ict101');

Route::get('/G12gas101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.G12gas101');
})->name('G12gas101');



// ProfileHS
Route::get('/ProfHS-G7101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfHS-G7101');
})->name('ProfHS-G7101');

Route::get('/ProfHS-G8101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfHS-G8101');
})->name('ProfHS-G8101');

Route::get('/ProfHS-G9101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfHS-G9101');
})->name('ProfHS-G9101');

Route::get('/ProfHS-G10101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfHS-G10101');
})->name('ProfHS-G10101');

//Profle Strand G11
Route::get('/ProfG11-stem101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfG11-stem101');
})->name('ProfG11-stem101');

Route::get('/ProfG11-abm101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfG11-abm101');
})->name('ProfG11-abm101');

Route::get('/ProfG11-gas101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfG11-gas101');
})->name('ProfG11-gas101');

Route::get('/ProfG11-ict101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfG11-ict101');
})->name('ProfG11-ict101');

//Profle Strand G12
Route::get('/ProfG12-stem101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfG12-stem101');
})->name('ProfG12-stem101');

Route::get('/ProfG12-abm101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfG12-abm101');
})->name('ProfG12-abm101');

Route::get('/ProfG12-gas101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfG12-gas101');
})->name('ProfG12-gas101');

Route::get('/ProfG12-ict101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.ProfG12-ict101');
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

Route::get('/Ct-appdis', function () {
    return view('AdminCtation.Ct-appdis');
})->name('Ct-appdis');

Route::get('/Ct-calendar', function () {
    return view('AdminCtation.Ct-calendar');
})->name('Ct-calendar');


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