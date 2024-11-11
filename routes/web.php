<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrCalendarController;
use App\Http\Controllers\FacultyControllerHighschool;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\StudentCalendarController;
use App\Http\Controllers\DpHeadConsultationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\HighSchoolCalendarController;

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ConsultController; // Updated from ConsultationController to ConsultController
use App\Http\Controllers\HighSchoolConsultController;

use App\Http\Controllers\HRBSITController;
use App\Http\Controllers\BSHMController;
use App\Http\Controllers\ACTController;
use App\Http\Controllers\HRTController;
use App\Http\Controllers\CETController;
use App\Http\Controllers\HRSController;
use App\Http\Controllers\TourismController;
use App\Http\Controllers\HrGrades7To10Controller;
use App\Http\Controllers\HrGrade11and12Controller;
use App\Http\Controllers\BSCSController;
use App\Http\Controllers\CtCollegeCourseController;

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

Route::get('/highschoolconsult', [HighSchoolConsultController::class, 'showHighSchoolConsultForm'])->name('highschoolconsult.form');
Route::post('/highschoolconsult/submit', [HighSchoolConsultController::class, 'submitHighSchoolConsult'])->name('highschoolconsult.submit');
Route::post('/highschoolconsult/approve/{id}', [HighSchoolConsultController::class, 'approveConsultation'])->name('highschoolconsult.approve');
Route::post('/highschoolconsult/decline/{id}', [HighSchoolConsultController::class, 'declineConsultation'])->name('highschoolconsult.decline');

// High School consultation approval, calendar, and history
Route::get('/highschoolconsult/approval', [HighSchoolConsultController::class, 'showApproval'])->name('highschool.approval');
Route::get('/highschoolconsult/calendar', [HighSchoolConsultController::class, 'showCalendar'])->name('highschool.calendar');
Route::get('/highschoolconsult/history', [HighSchoolConsultController::class, 'showHistory'])->name('highschool.history');


Route::post('/consult/approve/{id}', [ConsultController::class, 'approveConsult'])->name('consult.approve');
Route::post('/highschool/consult/approve/{id}', [HighSchoolConsultController::class, 'approveConsult'])->name('highschoolconsult.approve');
Route::post('/consult/approve/{id}', [ConsultController::class, 'approveConsult'])->name('consult.approve');
Route::post('/highschool/approve/{id}', [HighSchoolConsultController::class, 'approveConsult'])->name('highschoolconsult.approve');
Route::post('/consult/approve/{id}', [ConsultController::class, 'approveConsult'])->name('consult.approve');
Route::post('/highschool/approve/{id}', [HighSchoolConsultController::class, 'approveConsult'])->name('highschoolconsult.approve');




Route::get('/consult/approval', [ConsultController::class, 'showApproval'])->name('consult.approval');
// Route for submitting the high school consultation form

Route::post('/consult/approval', [ConsultController::class, 'showApproval'])->name('consult.approval');


Route::get('/admin/calendar', [ConsultController::class, 'showCalendar'])->name('admin.calendar');
Route::get('/admin/approval', [ConsultController::class, 'showApproval'])->name('admin.approval');
Route::get('/admin/history', [ConsultController::class, 'showHistory'])->name('admin.history');

Route::get('/consult', [ConsultController::class, 'showConsultForm'])->name('consult.form');

// Routes for consultation

Route::post('/highschoolconsult/approval', [ConsultController::class, 'submitHighSchoolConsult'])->name('highschoolconsult.approval');
Route::post('/consult/submit', [ConsultController::class, 'submitConsult'])->name('consult.submit');
Route::get('/approval', [ConsultController::class, 'showApproval'])->name('consult.approval');
Route::post('/consult/approve/{id}', [ConsultController::class, 'approveConsult'])->name('consult.approve');
Route::post('/consult/decline/{id}', [ConsultController::class, 'declineConsult'])->name('consult.decline');
Route::get('/history', [ConsultController::class, 'showHistory'])->name('consult.history');

Route::post('/busyhourscreation', [CalendarController::class, 'createBusyEvent'])->name('busyhourscreate');

// Routes for calendar
Route::get('/calendar', [CalendarController::class, 'showCalendar'])->name('calendar.show');

// Route to create a calendar event (other than busy hour)
Route::post('/create-event', [CalendarController::class, 'createEvent'])->name('create.event');

// Additional route to handle destroying busy hours (if it's different from `deleteBusyHour`)
Route::delete('/busyhours/{id}', [CalendarController::class, 'destroyBusyHour'])->name('busyhours.destroy');

Route::delete('/busyhours/{id}', [CalendarController::class, 'deleteBusyHour'])->name('deletehours');





//LOGIN AND REGISTER//

Route::get('/',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/',[AuthController::class,'login'])->name('login.submit');
Route::get('/logout',[AuthController::class,'logout'])->middleware('auth')->name('logout');




Route::get('/register', [StudentController::class, 'create'])->name('students.create');
Route::post('/registration', [StudentController::class, 'store'])->name('students.store');


Route::get('/register',[AuthController::class,'registration'])->name('registration');
Route::post('/register',[AuthController::class,'register'])->name('register');


// Student routes

Route::get('/student.student.dashboard', function () {return view('student.student.dashboard');
})->middleware('auth')->name('student.student.dashboard');

//for student number

Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');



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

//new evaluation routes
Route::get('/student/evaluation/show', [EvaluationController::class, 'index'])
->name('evaluations.show');


Route::get('/hr/college/bsit/third-year/students', [EvaluationController::class, 'showStudents'])
->name('bsit.thirdyear.students');

Route::get('/student/evaluation/evaluations-show', [EvaluationController::class, 'showEvaluations'])
->name('evaluation.show');

//studentCalendar
Route::get('/student-calendar', [StudentCalendarController::class, 'index'])->name('studeHrCalendar.index');
Route::get('/student-calendar/events', [StudentCalendarController::class, 'events'])->name('studentCalendar.events');

Route::get('/consultation', function () {
    return view('student.consultation.consult');
})->name('consultation');

Route::get('/Appointment', function () {
    return view('student.consultation.consult');
})->name('Appointment');



Route::get('/highschool', function () {
    return view('student.consultation.highschool');
})->name('highschool');



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
    return view('hr.HrCollegeBSIT.HrBSIT');
})->name('HrBSIT');

Route::get('/HrCollegeCourse', function () {
    return view('hr.HrCollegeCourse');
})->name('HrCollegeCourse');


//HR BSHM ROUTE
Route::get('/HrHM', function () {
    return view('hr.HRBSHM.HrHM');
})->name('HrHm');


//HR ACT ROUTE
Route::get('/HrACT', function () {
    return view('hr.HrACT.HrACT');
})->name('HrACT');


//HR HRT

Route::get('/HrHRT', function () {
    return view('hr.HrHRT.HrHRT');
})->name('HrHRT');

//COMSCI

Route::get('/HrBSCS', function () {
    return view('hr.HrBSCS.HrBSCS');
})->name('HrBSCS');

//CET

Route::get('/HrCET', function () {
    return view('hr.HrCET.HrCET');
})->name('HrCET');

//HRS

Route::get('/HrHRS', function () {
    return view('hr.HrHRS.HrHRS');
})->name('HrHRS');

//Tourism
Route::get('/HrTourism', function () {
    return view('hr.HrTourism.HrTourism');
})->name('HrTourism');


// HR High School Route

Route::get('/HrHighSchool', function () {
    return view('hr.HrHighSchool');
})->name('HrHighSchool');


// ProfileHS
Route::get('/HsProfile', function () {
    return view('hr.HRHighSchool.HsProfile');
})->name('HsProfile');

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
    return view('hr.HrCollegeBSIT.HrProfile');
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





Route::get('/CtHighSchoolSection', function () {
    return view('AdminCtation.CtHighSchoolSection');
})->name('CtHighSchoolSection');


//highschool route
Route::get('/CTHS-G10level', function () {
    return view('AdminCtation.StudentlistinfoHS.CTHS-G10level');
})->name('CTHS-G10level');

//for section highschool and strand

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

//Profile Controller
Route::get('/profile/bsit{level}', [ProfileController::class, 'showProfile'])->name('profile.show');
//

Route::get('/CtNotification', function () {
    return view('AdminCtation.CtNotification');
})->name('CtNotification');



Route::get('/CtSettings', function () {
    return view('AdminCtation.CtSettings');
})->name('CtSettings');

Route::get('/CtDocumentation', function () {
    return view('AdminCtation.CtDocumentation');
})->name('CtDocumentation');


//Department Head
Route::get('/DpHeadDB', function () {
    return view('DpHead.DpHeadDB');
})->name('DpHeadDB');

Route::get('/DpHeadAppDis', function () {
    return view('DpHead.DpHeadAppDis');
})->name('DpHeadAppDis');


//HIGHSCHOOL ROUTE FOR STUDENT SIDEBAR

Route::get('/HighSchoolSettings', function () {
    return view('student.HighSchool.HighSchoolSettings');
})->name('HighSchoolSettings');


// Student Profile  College
Route::get('/HrProfile/{studentId}', [StudentController::class, 'show'])->name('HrProfile');

//HighSchool
Route::get('/HsProfile/{id}', [HrGrades7To10Controller::class, 'show'])->name('HsProfile');


// Route for showing the registration form
Route::get('/students/register', [StudentController::class, 'create'])->name('students.create');

// Route for storing a new student
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

// Route for viewing a specific student's profile
Route::get('/students/{id}', [HRBSITController::class, 'show'])->name('student.show');


// Route for viewing the student's dashboard (if separate from show)
Route::get('/student-evaluation-consultation/{id}', [StudentController::class, 'dashboard'])->name('student-evaluation-consultation');



//HRS

Route::get('/HRS101', [HRSController::class, 'showHRS101'])->name('HRS101');
Route::get('/HRS102', [HRSController::class, 'showHRS102'])->name('HRS102');
Route::get('/HRS103', [HRSController::class, 'showHRS103'])->name('HRS103');

Route::get('/HRS201', [HRSController::class, 'showHRS201'])->name('HRS201');
Route::get('/HRS202', [HRSController::class, 'showHRS202'])->name('HRS202');
Route::get('/HRS203', [HRSController::class, 'showHRS203'])->name('HRS203');

Route::get('/HRS301', [HRSController::class, 'showHRS301'])->name('HRS301');
Route::get('/HRS302', [HRSController::class, 'showHRS302'])->name('HRS302');
Route::get('/HRS303', [HRSController::class, 'showHRS303'])->name('HRS303');

Route::get('/HRS401', [HRSController::class, 'showHRS401'])->name('HRS401');
Route::get('/HRS402', [HRSController::class, 'showHRS402'])->name('HRS402');
Route::get('/HRS403', [HRSController::class, 'showHRS403'])->name('HRS403');
//TOURISM

Route::get('/Tourism101', [TourismController::class, 'showTourism101'])->name('Tourism101');
Route::get('/Tourism102', [TourismController::class, 'showTourism102'])->name('Tourism102');
Route::get('/Tourism103', [TourismController::class, 'showTourism103'])->name('Tourism103');

Route::get('/Tourism201', [TourismController::class, 'showTourism201'])->name('Tourism201');
Route::get('/Tourism202', [TourismController::class, 'showTourism202'])->name('Tourism202');
Route::get('/Tourism203', [TourismController::class, 'showTourism203'])->name('Tourism203');

Route::get('/Tourism301', [TourismController::class, 'showTourism301'])->name('Tourism301');
Route::get('/Tourism302', [TourismController::class, 'showTourism302'])->name('Tourism302');
Route::get('/Tourism303', [TourismController::class, 'showTourism303'])->name('Tourism303');

Route::get('/Tourism401', [TourismController::class, 'showTourism401'])->name('Tourism401');
Route::get('/Tourism402', [TourismController::class, 'showTourism402'])->name('Tourism402');
Route::get('/Tourism403', [TourismController::class, 'showTourism403'])->name('Tourism403');

Route::get('/ConsultationBSIT', function () {
    return view('AdminCtation.CTBSIT.ConsultationBSIT');
})->name('ConsultationBSIT');


Route::get('/ConsultationBSHM', function () {
    return view('AdminCtation.CTBSHM.ConsultationBSHM');
})->name('\ConsultationBSHM');


Route::get('/ConsultationBsit101', function () {
    return view('AdminCtation.CTBSIT.CTBSITFirstYear.ConsultationBsit101');
})->name('ConsultationBsit101');

Route::get('/CtProfile', function () {
    return view('AdminCtation.CtProfile');
})->name('CtProfile');


Route::get('/ConsultationBsit101/profile/{id}', [CtCollegeCourseController::class, 'showProfile'])->name('CtProfile');


Route::get('/ConsultationBsit101', [CtCollegeCourseController::class, 'showCtBsit101Students'])->name('ConsultationBSIT');




// web.php

Route::get('/DpHeadDashboard', function () {
    return view('DpHead.DpHeadDashboard');
})->middleware('auth')->name('DpHeadDashboard');


Route::get('/ConsultationBSITCourse', function () {
    return view('AdminCtation.CtBsit.ConsultationBSITCourse');
})->name('ConsultationBSITCourse');

Route::get('/ConsultationBSHMCourse', function () {
    return view('AdminCtation.CtBshm.ConsultationBSHMCourse');
})->name('ConsultationBSHMCourse');

Route::get('/ConsultationACT', function () {
    return view('AdminCtation.CtACT.ConsultationACT');
})->name('ConsultationACT');

Route::get('/ConsultationHRT', function () {
    return view('AdminCtation.CTHRT.ConsultationHRT');
})->name('ConsultationHRT');

Route::get('/ConsultationCET', function () {
    return view('AdminCtation.CtCet.ConsultationCET');
})->name('ConsultationCET');

Route::get('/ConsultationHRS', function () {
    return view('AdminCtation.CtHRS.ConsultationHRS');
})->name('ConsultationHRS');

Route::get('/ConsultationTOURISM', function () {
    return view('AdminCtation.CtTourism.ConsultationTOURISM');
})->name('ConsultationTOURISM');

Route::get('/ConsultationBSCS', function () {
    return view('AdminCtation.CtBSCS.ConsultationBSCS');
})->name('ConsultationBSCS');


Route::get('/BSIT101', [HRBSITController::class, 'listStudentsBySection'])->name('BSIT101')->middleware('auth', 'role:Hradmin,Ctadmin');

Route::get('/BSIT102', [HRBSITController::class, 'listStudentsBySection'])
     ->name('BSIT102')
     ->middleware(['auth', 'role:Hradmin,Ctadmin']);

// Route for BSIT103 (accessible by both Hradmin and Ctadmin)
Route::get('/BSIT103', [HRBSITController::class, 'listStudentsBySection'])
     ->name('BSIT103')
     ->middleware(['auth', 'role:Hradmin,Ctadmin']);


     // Routes for BSIT second year (201, 202, 203)
Route::get('/BSIT201', [HRBSITController::class, 'listStudentsBySection'])
->name('BSIT201')
->middleware(['auth', 'role:Hradmin,Ctadmin']);

Route::get('/BSIT202', [HRBSITController::class, 'listStudentsBySection'])
->name('BSIT202')
->middleware(['auth', 'role:Hradmin,Ctadmin']);

Route::get('/BSIT203', [HRBSITController::class, 'listStudentsBySection'])
->name('BSIT203')
->middleware(['auth', 'role:Hradmin,Ctadmin']);

// Routes for BSIT third year (301, 302, 303)
Route::get('/BSIT301', [HRBSITController::class, 'listStudentsBySection'])
->name('BSIT301')
->middleware(['auth', 'role:Hradmin,Ctadmin']);

Route::get('/BSIT302', [HRBSITController::class, 'listStudentsBySection'])
->name('BSIT302')
->middleware(['auth', 'role:Hradmin,Ctadmin']);

Route::get('/BSIT303', [HRBSITController::class, 'listStudentsBySection'])
->name('BSIT303')
->middleware(['auth', 'role:Hradmin,Ctadmin']);

// Routes for BSIT fourth year (401, 402, 403)
Route::get('/BSIT401', [HRBSITController::class, 'listStudentsBySection'])
->name('BSIT401')
->middleware(['auth', 'role:Hradmin,Ctadmin']);

Route::get('/BSIT402', [HRBSITController::class, 'listStudentsBySection'])
->name('BSIT402')
->middleware(['auth', 'role:Hradmin,Ctadmin']);

Route::get('/BSIT403', [HRBSITController::class, 'listStudentsBySection'])
->name('BSIT403')
->middleware(['auth', 'role:Hradmin,Ctadmin']);


Route::get('/BSHM101', [BSHMController::class, 'listStudentsBySection'])->name('BSHM101')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/BSHM102', [BSHMController::class, 'listStudentsBySection'])->name('BSHM102')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/BSHM103', [BSHMController::class, 'listStudentsBySection'])->name('BSHM103')->middleware('auth', 'role:Hradmin,Ctadmin');

Route::get('/BSHM201', [BSHMController::class, 'listStudentsBySection'])->name('BSHM201')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/BSHM202', [BSHMController::class, 'listStudentsBySection'])->name('BSHM202')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/BSHM203', [BSHMController::class, 'listStudentsBySection'])->name('BSHM203')->middleware('auth', 'role:Hradmin,Ctadmin');

Route::get('/BSHM301', [BSHMController::class, 'listStudentsBySection'])->name('BSHM301')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/BSHM302', [BSHMController::class, 'listStudentsBySection'])->name('BSHM302')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/BSHM303', [BSHMController::class, 'listStudentsBySection'])->name('BSHM303')->middleware('auth', 'role:Hradmin,Ctadmin');

Route::get('/BSHM401', [BSHMController::class, 'listStudentsBySection'])->name('BSHM401')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/BSHM402', [BSHMController::class, 'listStudentsBySection'])->name('BSHM402')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/BSHM403', [BSHMController::class, 'listStudentsBySection'])->name('BSHM403')->middleware('auth', 'role:Hradmin,Ctadmin');

//ACT

Route::get('/ACT101', [ACTController::class, 'listStudentsBySection'])->name('ACT101')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/ACT102', [ACTController::class, 'listStudentsBySection'])->name('ACT102')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/ACT103', [ACTController::class, 'listStudentsBySection'])->name('ACT103')->middleware('auth', 'role:Hradmin,Ctadmin');

// Second Year
Route::get('/ACT201', [ACTController::class, 'listStudentsBySection'])->name('ACT201')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/ACT202', [ACTController::class, 'listStudentsBySection'])->name('ACT202')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/ACT203', [ACTController::class, 'listStudentsBySection'])->name('ACT203')->middleware('auth', 'role:Hradmin,Ctadmin');

// Third Year
Route::get('/ACT301', [ACTController::class, 'listStudentsBySection'])->name('ACT301')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/ACT302', [ACTController::class, 'listStudentsBySection'])->name('ACT302')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/ACT303', [ACTController::class, 'listStudentsBySection'])->name('ACT303')->middleware('auth', 'role:Hradmin,Ctadmin');

// Fourth Year
Route::get('/ACT401', [ACTController::class, 'listStudentsBySection'])->name('ACT401')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/ACT402', [ACTController::class, 'listStudentsBySection'])->name('ACT402')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/ACT403', [ACTController::class, 'listStudentsBySection'])->name('ACT403')->middleware('auth', 'role:Hradmin,Ctadmin');


// First Year
Route::get('/HRT101', [HRTController::class, 'listStudentsBySection'])->name('HRT101')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/HRT102', [HRTController::class, 'listStudentsBySection'])->name('HRT102')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/HRT103', [HRTController::class, 'listStudentsBySection'])->name('HRT103')->middleware('auth', 'role:Hradmin,Ctadmin');

// Second Year
Route::get('/HRT201', [HRTController::class, 'listStudentsBySection'])->name('HRT201')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/HRT202', [HRTController::class, 'listStudentsBySection'])->name('HRT202')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/HRT203', [HRTController::class, 'listStudentsBySection'])->name('HRT203')->middleware('auth', 'role:Hradmin,Ctadmin');

// Third Year
Route::get('/HRT301', [HRTController::class, 'listStudentsBySection'])->name('HRT301')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/HRT302', [HRTController::class, 'listStudentsBySection'])->name('HRT302')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/HRT303', [HRTController::class, 'listStudentsBySection'])->name('HRT303')->middleware('auth', 'role:Hradmin,Ctadmin');

// Fourth Year
Route::get('/HRT401', [HRTController::class, 'listStudentsBySection'])->name('HRT401')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/HRT402', [HRTController::class, 'listStudentsBySection'])->name('HRT402')->middleware('auth', 'role:Hradmin,Ctadmin');
Route::get('/HRT403', [HRTController::class, 'listStudentsBySection'])->name('HRT403')->middleware('auth', 'role:Hradmin,Ctadmin');


//

Route::middleware(['auth', 'role:Hradmin,Ctadmin'])->group(function () {
    Route::get('/CET101', [CETController::class, 'listStudentsBySection'])->name('CET101');
    Route::get('/CET102', [CETController::class, 'listStudentsBySection'])->name('CET102');
    Route::get('/CET103', [CETController::class, 'listStudentsBySection'])->name('CET103');
    Route::get('/CET201', [CETController::class, 'listStudentsBySection'])->name('CET201');
    Route::get('/CET202', [CETController::class, 'listStudentsBySection'])->name('CET202');
    Route::get('/CET203', [CETController::class, 'listStudentsBySection'])->name('CET203');
    Route::get('/CET301', [CETController::class, 'listStudentsBySection'])->name('CET301');
    Route::get('/CET302', [CETController::class, 'listStudentsBySection'])->name('CET302');
    Route::get('/CET303', [CETController::class, 'listStudentsBySection'])->name('CET303');
    Route::get('/CET401', [CETController::class, 'listStudentsBySection'])->name('CET401');
    Route::get('/CET402', [CETController::class, 'listStudentsBySection'])->name('CET402');
    Route::get('/CET403', [CETController::class, 'listStudentsBySection'])->name('CET403');
});



Route::middleware(['auth', 'role:Hradmin,Ctadmin'])->group(function () {
    // Route for listing students by section for Hradmin and Ctadmin
    Route::get('/HRS101', [HRSController::class, 'listStudentsBySection'])->name('HRS101');
    Route::get('/HRS102', [HRSController::class, 'listStudentsBySection'])->name('HRS102');
    Route::get('/HRS103', [HRSController::class, 'listStudentsBySection'])->name('HRS103');
    Route::get('/HRS201', [HRSController::class, 'listStudentsBySection'])->name('HRS201');
    Route::get('/HRS202', [HRSController::class, 'listStudentsBySection'])->name('HRS202');
    Route::get('/HRS203', [HRSController::class, 'listStudentsBySection'])->name('HRS203');
    Route::get('/HRS301', [HRSController::class, 'listStudentsBySection'])->name('HRS301');
    Route::get('/HRS302', [HRSController::class, 'listStudentsBySection'])->name('HRS302');
    Route::get('/HRS303', [HRSController::class, 'listStudentsBySection'])->name('HRS303');
    Route::get('/HRS401', [HRSController::class, 'listStudentsBySection'])->name('HRS401');
    Route::get('/HRS402', [HRSController::class, 'listStudentsBySection'])->name('HRS402');
    Route::get('/HRS403', [HRSController::class, 'listStudentsBySection'])->name('HRS403');
});

Route::middleware(['auth', 'role:Hradmin,Ctadmin'])->group(function () {
    // Route for listing students by section for Hradmin and Ctadmin
    Route::get('/Tourism101', [TourismController::class, 'listStudentsBySection'])->name('Tourism101');
    Route::get('/Tourism102', [TourismController::class, 'listStudentsBySection'])->name('Tourism102');
    Route::get('/Tourism103', [TourismController::class, 'listStudentsBySection'])->name('Tourism103');
    Route::get('/Tourism201', [TourismController::class, 'listStudentsBySection'])->name('Tourism201');
    Route::get('/Tourism202', [TourismController::class, 'listStudentsBySection'])->name('Tourism202');
    Route::get('/Tourism203', [TourismController::class, 'listStudentsBySection'])->name('Tourism203');
    Route::get('/Tourism301', [TourismController::class, 'listStudentsBySection'])->name('Tourism301');
    Route::get('/Tourism302', [TourismController::class, 'listStudentsBySection'])->name('Tourism302');
    Route::get('/Tourism303', [TourismController::class, 'listStudentsBySection'])->name('Tourism303');
    Route::get('/Tourism401', [TourismController::class, 'listStudentsBySection'])->name('Tourism401');
    Route::get('/Tourism402', [TourismController::class, 'listStudentsBySection'])->name('Tourism402');
    Route::get('/Tourism403', [TourismController::class, 'listStudentsBySection'])->name('Tourism403');
});

Route::middleware(['auth', 'role:Hradmin,Ctadmin'])->group(function () {
    Route::get('/BSCS101', [BSCSController::class, 'listStudentsBySection'])->name('BSCS101');
    Route::get('/BSCS102', [BSCSController::class, 'listStudentsBySection'])->name('BSCS102');
    Route::get('/BSCS103', [BSCSController::class, 'listStudentsBySection'])->name('BSCS103');
    Route::get('/BSCS201', [BSCSController::class, 'listStudentsBySection'])->name('BSCS201');
    Route::get('/BSCS202', [BSCSController::class, 'listStudentsBySection'])->name('BSCS202');
    Route::get('/BSCS203', [BSCSController::class, 'listStudentsBySection'])->name('BSCS203');
    Route::get('/BSCS301', [BSCSController::class, 'listStudentsBySection'])->name('BSCS301');
    Route::get('/BSCS302', [BSCSController::class, 'listStudentsBySection'])->name('BSCS302');
    Route::get('/BSCS303', [BSCSController::class, 'listStudentsBySection'])->name('BSCS303');
    Route::get('/BSCS401', [BSCSController::class, 'listStudentsBySection'])->name('BSCS401');
    Route::get('/BSCS402', [BSCSController::class, 'listStudentsBySection'])->name('BSCS402');
    Route::get('/BSCS403', [BSCSController::class, 'listStudentsBySection'])->name('BSCS403');
});



// HS PROFILE

Route::get('highschool/{section}/{studentId}', [HrGrade11and12Controller::class, 'show'])->name('highschool.profile');

//HIGHSCHOOL

Route::middleware(['auth', 'role:Hradmin,Ctadmin'])->group(function () {
    Route::get('/Grade7', [HrGrades7To10Controller::class, 'listStudentsBySection'])->name('Grade7');
    Route::get('/Grade8', [HrGrades7To10Controller::class, 'listStudentsBySection'])->name('Grade8');
    Route::get('/Grade9', [HrGrades7To10Controller::class, 'listStudentsBySection'])->name('Grade9');
    Route::get('/Grade10', [HrGrades7To10Controller::class, 'listStudentsBySection'])->name('Grade10');
});


Route::middleware(['auth', 'role:Hradmin,Ctadmin'])->group(function () {
    Route::get('/Grade11Lovelace', [HrGrade11and12Controller::class, 'listStudentsBySection'])->name('Grade11Lovelace');
    Route::get('/Grade11Aristotle', [HrGrade11and12Controller::class, 'listStudentsBySection'])->name('Grade11Aristotle');
    Route::get('/Grade11StClare', [HrGrade11and12Controller::class, 'listStudentsBySection'])->name('Grade11StClare');
    Route::get('/Grade11Duflo', [HrGrade11and12Controller::class, 'listStudentsBySection'])->name('Grade11Duflo');
    Route::get('/Grade11EsCoZier', [HrGrade11and12Controller::class, 'listStudentsBySection'])->name('Grade11EsCoZier');

    Route::get('/Torvalds', [HrGrade11and12Controller::class, 'listStudentsBySection'])->name('Grade12Torvalds');
    Route::get('/Marshall', [HrGrade11and12Controller::class, 'listStudentsBySection'])->name('Grade12Marshall');
    Route::get('/Marcus', [HrGrade11and12Controller::class, 'listStudentsBySection'])->name('Grade12Marcus');
    Route::get('/SanPedroCalungsod', [HrGrade11and12Controller::class, 'listStudentsBySection'])->name('Grade12SanPedroCalungsod');
    Route::get('/Einstein', [HrGrade11and12Controller::class, 'listStudentsBySection'])->name('Grade12Einstein');

});
Route::get('Grade{studentId}', [HrGrades7To10Controller::class, 'show'])->name('highschool.profile');