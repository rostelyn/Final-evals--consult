<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrCalendarController;
use App\Http\Controllers\Hrcalendar;
use App\Http\Controllers\FacultyControllerHighschool;
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

Route::get('/facultyhighschool', [FacultyControllerHighschool::class, 'index'])->name('facultyhighschool.index');
Route::get('/facultyhighschool/{departmenthighschool}', [FacultyControllerHighschool::class, 'show']);


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

//StudentPickEvaluation

Route::get('/StudentPickEvaluation', function () {
    return view('student.StudentPickEvaluation');
})->name('StudentPickEvaluation');

Route::get('/StudentPickConsultation', function () {
    return view('student.StudentPickConsultation');
})->name('StudentPickConsultation');

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

Route::get('/GRADE11Stem', function () {
    return view('hr.HRHighSchool.12STRANDSECTION.12STEM.GRADE11Stem');
})->name('GRADE11Stem');

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
Route::get('/GRADE11STEM', function () {
    return view('hr.HRHighSchool.HSPROFILE.GRADE11STEM');
})->name('GRADE11STEM');

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

Route::get('/CtDocumentation', function () {
    return view('AdminCtation.CtDocumentation');
})->name('CtDocumentation');

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
Route::get('/ConsultationBSITCourse', function () {
    return view('AdminCtation.StudentlistinfoCL.ConsultationBSITCourse');
})->name('ConsultationBSITCourse');


//highschool route
Route::get('/CTHS-G10level', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G10level');
})->name('CTHS-G10level');

//for section highschool and strand
Route::get('/CTGrade7-101', function () {
    return view('AdminCtation.StudentlistinfoHS.CTViewStudent.CTGrade7-101');
})->name('CTGrade7-101');

Route::get('/CTGrade8-101', function () {
    return view('AdminCtation.StudentlistinfoHS.CTViewStudent.CTGrade8-101');
})->name('CTGrade8-101');

Route::get('/CTGrade9-101', function () {
    return view('AdminCtation.StudentlistinfoHS.CTViewStudent.CTGrade9-101');
})->name('CTGrade9-101');

Route::get('/CTGrade10-101', function () {
    return view('AdminCtation.StudentlistinfoHS.CTViewStudent.CTGrade10-101');
})->name('CTGrade10-101');

//strand G11
Route::get('/CT11ABM', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CT11ABM');
})->name('CT11ABM');

Route::get('/CT11STEM', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CT11STEM');
})->name('CT11STEM');

Route::get('/CT11GAS', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CT11GAS');
})->name('CT11GAS');

Route::get('/CT11ICT', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CT11ICT');
})->name('CT11ICT');

Route::get('/G11abm101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTStrandSection.G11abm101');
})->name('G11abm101');

Route::get('/G11stem101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTStrandSection.G11stem101');
})->name('G11stem101');

Route::get('/G11ict101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTStrandSection.G11ict101');
})->name('G11ict101');

Route::get('/G11gas101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTStrandSection.G11gas101');
})->name('G11gas101');

//strang G12
Route::get('/CT12ABM', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CT12ABM');
})->name('CT12ABM');

Route::get('/CT12STEM', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CT12STEM');
})->name('CT12STEM');

Route::get('/CT12GAS', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CT12GAS');
})->name('CT12GAS');

Route::get('/CT12ICT', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CT12ICT');
})->name('CT12ICT');

Route::get('/G12abm101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTStrandSection.G12abm101');
})->name('G12abm101');

Route::get('/G12stem101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTStrandSection.G12stem101');
})->name('G12stem101');

Route::get('/G12ict101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTStrandSection.G12ict101');
})->name('G12ict101');

Route::get('/G12gas101', function () {
    return view('AdminCtation.StudentlistinfoHS.CtHS-Strand.CTStrandSection.G12gas101');
})->name('G12gas101');



// ProfileHS
Route::get('/Grade7-101Profile', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.Grade7-101Profile');
})->name('Grade7-101Profile');

Route::get('/Grade8-101Profile', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.Grade8-101Profile');
})->name('Grade8-101Profile');

Route::get('/Grade9-101Profile', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.Grade9-101Profile');
})->name('Grade9-101Profile');

Route::get('/Grade10-101Profile', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.Grade10-101Profile');
})->name('Grade10-101Profile');

//Profle Strand G11
Route::get('/GRADE11STEM', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.GRADE11STEM');
})->name('GRADE11STEM');

Route::get('/GRADE11ABM', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.GRADE11ABM');
})->name('GRADE11ABM');

Route::get('/GRADE11GAS', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.GRADE11GAS');
})->name('GRADE11GAS');

Route::get('/GRADE11ICT', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.GRADE11ICT');
})->name('GRADE11ICT');

//Profle Strand G12
Route::get('/GRADE12STEM', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.GRADE12STEM');
})->name('GRADE12STEM');

Route::get('/GRADE12ABM', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.GRADE12ABM');
})->name('GRADE12ABM');

Route::get('/GRADE12GAS', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.GRADE12GAS');
})->name('GRADE12GAS');

Route::get('/GRADE12ICT', function () {
    return view('AdminCtation.StudentlistinfoHS.CtProfileHS.GRADE12ICT');
})->name('GRADE12ICT');


//for section college
Route::get('/ConsultationBsit101', function () {
    return view('AdminCtation.StudentlistinfoCL.ConsultationBsit101');
})->name('ConsultationBsit101');

Route::get('/ConsultationBsit201', function () {
    return view('AdminCtation.StudentlistinfoCL.ConsultationBsit201');
})->name('ConsultationBsit201');

Route::get('/ConsultationBsit301', function () {
    return view('AdminCtation.StudentlistinfoCL.ConsultationBsit301');
})->name('ConsultationBsit301');

Route::get('/ConsultationBsit401', function () {
    return view('AdminCtation.StudentlistinfoCL.ConsultationBsit401');
})->name('ConsultationBsit401');

//Profile
Route::get('/BSIT101Profile', function () {
    return view('AdminCtation.StudentlistinfoCL.Profile.BSIT101Profile');
})->name('BSIT101Profile');

Route::get('/BSIT201Profile', function () {
    return view('AdminCtation.StudentlistinfoCL.Profile.BSIT201Profile');
})->name('BSIT201Profile');

Route::get('/BSIT301Profile', function () {
    return view('AdminCtation.StudentlistinfoCL.Profile.BSIT301Profile');
})->name('BSIT301Profile');

Route::get('/BSIT401Profile', function () {
    return view('AdminCtation.StudentlistinfoCL.Profile.BSIT401Profile');
})->name('BSIT401Profile');

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
