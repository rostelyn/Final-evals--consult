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
use App\Http\Controllers\StudentController;



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
Route::get('/Grade7-101', function () {
    return view('hr.HRHighSchool.VIEWSTUDENT.Grade7-101');
})->name('Grade7-101');

Route::get('/Grade8-101', function () {
    return view('hr.HRHighSchool.VIEWSTUDENT.Grade8-101');
})->name('Grade8-101');

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

Route::get('/GRADE11Ict', function () {
    return view('hr.HRHighSchool.11STRANDSECTION.11ICT.GRADE11Ict');
})->name('GRADE11Ict');

Route::get('/GRADE11Gas', function () {
    return view('hr.HRHighSchool.11STRANDSECTION.11GAS.GRADE11Gas');
})->name('GRADE11Gas');

Route::get('/11ABM101', function () {
    return view('hr.HRHighSchool.STRAND.11ABM101');
})->name('11ABM101');

Route::get('/11STEM101', function () {
    return view('hr.HRHighSchool.STRAND.11STEM101');
})->name('11STEM101');

Route::get('/11ICT101', function () {
    return view('hr.HRHighSchool.STRAND.11ICT101');
})->name('11ICT101');

Route::get('/11GAS101', function () {
    return view('hr.HRHighSchool.STRAND.11GAS101');
})->name('11GAS101');

//strand G12
Route::get('/GRADE12Abm', function () {
    return view('hr.HRHighSchool.12STRANDSECTION.12ABM.GRADE12Abm');
})->name('GRADE12Abm');

Route::get('/GRADE12Stem', function () {
    return view('hr.HRHighSchool.12STRANDSECTION.12STEM.GRADE12Stem');
})->name('GRADE12Stem');

Route::get('/GRADE12Gas', function () {
    return view('hr.HRHighSchool.12STRANDSECTION.12GAS.GRADE12Gas');
})->name('GRADE12Gas');

Route::get('/GRADE12Ict', function () {
    return view('hr.HRHighSchool.12STRANDSECTION.12ICT.GRADE12Ict');
})->name('GRADE12Ict');

Route::get('/12ABM101', function () {
    return view('hr.HRHighSchool.STRAND.12ABM101');
})->name('12ABM101');

Route::get('/12STEM101', function () {
    return view('hr.HRHighSchool.STRAND.12STEM101');
})->name('12STEM101');

Route::get('/12ICT101', function () {
    return view('hr.HRHighSchool.STRAND.12ICT101');
})->name('12ICT101');

Route::get('/12GAS101', function () {
    return view('hr.HRHighSchool.STRAND.12GAS101');
})->name('12GAS101');



// ProfileHS
Route::get('/GRADE7PROFILE', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE7PROFILE');
})->name('GRADE7PROFILE');

Route::get('/GRADE8PROFILE', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE8PROFILE');
})->name('GRADE8PROFILE');

Route::get('/GRADE9PROFILE', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE9PROFILE');
})->name('GRADE9PROFILE');

Route::get('/GRADE10PROFILE', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE10PROFILE');
})->name('GRADE10PROFILE');

//Profle Strand G11
Route::get('/GRADE11STEM', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE11STEM');
})->name('GRADE11STEM');

Route::get('/GRADE11ABM', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE11ABM');
})->name('GRADE11ABM');

Route::get('/GRADE11GAS', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE11GAS');
})->name('GRADE11GAS');

Route::get('/GRADE11ICT', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE11ICT');
})->name('GRADE11ICT');

//Profle Strand G12
Route::get('/GRADE12STEM', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE12STEM');
})->name('GRADE12STEM');

Route::get('/GRADE12ABM', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE12ABM');
})->name('GRADE12ABM');

Route::get('/GRADE12GAS', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE12GAS');
})->name('GRADE12GAS');

Route::get('/GRADE12ICT', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE12ICT');
})->name('GRADE12ICT');

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
Route::get('/CTDashboard', function () {
    return view('AdminCtation.CTDashboard');
})->middleware('auth')->name('CTDashboard');

// routes/web.php

Route::get('/CtStudentList', function () {
    return view('AdminCtation.CtStudentList');
})->name('CtStudentList');

Route::get('/CtCollegeCourse', function () {
    return view('AdminCtation.CtCollegeCourse');
})->name('CtCollegeCourse');


Route::get('/CtCalendar', function () {
    return view('AdminCtation.CtCalendar');
})->name('CtCalendar');


Route::get('/CtHighSchoolSection', function () {
    return view('AdminCtation.CtHighSchoolSection');
})->name('CtHighSchoolSection');

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

Route::get('/CtApprroveDisapprove', function () {
    return view('AdminCtation.CtApprroveDisapprove');
})->name('CtApprroveDisapprove');

Route::get('/CtCalendar', function () {
    return view('AdminCtation.CtCalendar');
})->name('CtCalendar');


Route::get('/CtNotification', function () {
    return view('AdminCtation.CtNotification');
})->name('CtNotification');

Route::get('/CtHistory', function () {
    return view('AdminCtation.CtHistory');
})->name('CtHistory');

Route::get('/CtSettings', function () {
    return view('AdminCtation.CtSettings');
})->name('CtSettings');


//consultation controller

Route::get('/CtApprroveDisapprove', [ConsultationController::class, 'index'])->name('CtApprroveDisapprove');
Route::post('/consultation', [ConsultationController::class, 'store'])->name('consultation.store');

Route::post('/consultations/approve/{id}', [ConsultationController::class, 'approve'])->name('consultations.approve');
Route::post('/consultations/disapprove/{id}', [ConsultationController::class, 'disapprove'])->name('consultations.disapprove');

//Department Head
Route::get('/DpHead', function () {
    return view('DpHead.DpHead');
})->name('DpHead');
Route::get('/DpHeadAppDis', [DpHeadConsultationController::class, 'index'])->middleware('auth')->name('DpHeadAppDis');


//STUDENT VIEW 

Route::get('/HrProfile/{studentId}', [StudentController::class, 'show'])->name('HrProfile');
