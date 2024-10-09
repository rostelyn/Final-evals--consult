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
use App\Http\Controllers\ConsultationHighschoolController;
use App\Http\Controllers\HighSchoolCalendarController;

use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ConsultController; // Updated from ConsultationController to ConsultController
use App\Http\Controllers\HighSchoolConsultController;

use App\Http\Controllers\HRBSITController;
use App\Http\Controllers\BSHMController;
use App\Http\Controllers\BSCSController;

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
Route::get('/student-calendar', [StudentCalendarController::class, 'index'])->name('studeHrCalendar.index');
Route::get('/student-calendar/events', [StudentCalendarController::class, 'events'])->name('studentCalendar.events');

Route::get('/consultation', function () {
    return view('student.consultation.consult');
})->name('consultation');

Route::get('/Appointment', function () {
    return view('student.consultation.consult');
})->name('Appointment');

//bago
Route::post('/consultationhighschool', [ConsultationHighschoolController::class, 'store'])->name('consultationhighschool.store');

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

Route::get('/HM101', function () {
    return view('hr.HRBSHM.HM101');
})->name('HM101');


//HR ACT ROUTE
Route::get('/HrACT', function () {
    return view('hr.HrACT.HrACT');
})->name('HrACT');

Route::get('/ACT101', function () {
    return view('hr.HrACT.ACT101');
})->name('ACT101');

//HR HRT

Route::get('/HrHRT', function () {
    return view('hr.HrHRT.HrHRT');
})->name('HrHRT');
Route::get('/HRT101', function () {
    return view('hr.HrHRT.HRT101');
})->name('HRT101');

//COMSCI

Route::get('/HrBSCS', function () {
    return view('hr.HrBSCS.HrBSCS');
})->name('HrBSCS');

//CET

Route::get('/HrCET', function () {
    return view('hr.HrCET.HrCET');
})->name('HrCET');
Route::get('/CET101', function () {
    return view('hr.HrCET.CET101');
})->name('CET101');

//HRS

Route::get('/HrHRS', function () {
    return view('hr.HrHRS.HrHRS');
})->name('HrHRS');
Route::get('/HRS101', function () {
    return view('hr.HrHRS.HRS101');
})->name('HRS101');

//Tourism
Route::get('/HrTourism', function () {
    return view('hr.HrTourism.HrTourism');
})->name('HrTourism');
Route::get('/Tourism101', function () {
    return view('hr.HrTourism.Tourism101');
})->name('Tourism101');



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
Route::get('/HRGRADE11STEM', function () {
    return view('hr.HRHighSchool.HSPROFILE.HRGRADE11STEM');
})->name('HRGRADE11STEM');

Route::get('/HRGRADE11ABM', function () {
    return view('hr.HRHighSchool.HSPROFILE.HRGRADE11ABM');
})->name('HRGRADE11ABM');

Route::get('/HRGRADE11GAS', function () {
    return view('hr.HRHighSchool.HSPROFILE.HRGRADE11GAS');
})->name('HRGRADE11GAS');

Route::get('/HRGRADE11ICT', function () {
    return view('hr.HRHighSchool.HSPROFILE.HRGRADE11ICT');
})->name('HRGRADE11ICT');

//Profle Strand G12
Route::get('/HRGRADE12STEM', function () {
    return view('hr.HRHighSchool.HSPROFILE.HRGRADE12STEM');
})->name('HRGRADE12STEM');

Route::get('/HRGRADE12ABM', function () {
    return view('hr.HRHighSchool.HSPROFILE.HRGRADE12ABM');
})->name('HRGRADE12ABM');

Route::get('/HRGRADE12GAS', function () {
    return view('hr.HRHighSchool.HSPROFILE.HRGRADE12GAS');
})->name('HRGRADE12GAS');

Route::get('/HRGRADE12ICT', function () {
    return view('hr.HRHighSchool.HSPROFILE.HRGRADE12ICT');
})->name('HRGRADE12ICT');

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






Route::get('/CtNotification', function () {
    return view('AdminCtation.CtNotification');
})->name('CtNotification');



Route::get('/CtSettings', function () {
    return view('AdminCtation.CtSettings');
})->name('CtSettings');

Route::get('/CtDocumentation', function () {
    return view('AdminCtation.CtDocumentation');
})->name('CtDocumentation');


//consultation controller



//Department Head
Route::get('/DpHeadDB', function () {
    return view('DpHead.DpHeadDB');
})->name('DpHeadDB');

Route::get('/DpHeadAppDis', function () {
    return view('DpHead.DpHeadAppDis');
})->name('DpHeadAppDis');




//STUDENT VIEW 

Route::get('/HrProfile/{studentId}', [StudentController::class, 'show'])->name('HrProfile');


//HIGHSCHOOL ROUTE FOR STUDENT SIDEBAR

Route::get('/HighSchoolSettings', function () {
    return view('student.HighSchool.HighSchoolSettings');
})->name('HighSchoolSettings');




// Route for showing the registration form
Route::get('/students/register', [StudentController::class, 'create'])->name('students.create');

// Route for storing a new student
Route::post('/students/store', [StudentController::class, 'store'])->name('students.store');

// Route for viewing a specific student's profile
Route::get('/students/{id}', [HRBSITController::class, 'show'])->name('student.show');

// Route for viewing the student's dashboard (if separate from show)
Route::get('/student-evaluation-consultation/{id}', [StudentController::class, 'dashboard'])->name('student-evaluation-consultation');



// HRBSIT Routes

Route::get('/HrBSIT101', [HRBSITController::class, 'showBSIT101'])->name('HrBSIT101');
Route::get('/HrBSIT102', [HRBSITController::class, 'showBSIT102'])->name('HrBSIT102');
Route::get('/HrBSIT103', [HRBSITController::class, 'showBSIT103'])->name('HrBSIT103');
Route::get('/HrBSIT201', [HRBSITController::class, 'showBSIT201'])->name('HrBSIT201');
Route::get('/HrBSIT202', [HRBSITController::class, 'showBSIT202'])->name('HrBSIT202');
Route::get('/HrBSIT203', [HRBSITController::class, 'showBSIT203'])->name('HrBSIT203');
Route::get('/HrBSIT301', [HRBSITController::class, 'showBSIT301'])->name('HrBSIT301');
Route::get('/HrBSIT302', [HRBSITController::class, 'showBSIT302'])->name('HrBSIT302');
Route::get('/HrBSIT303', [HRBSITController::class, 'showBSIT303'])->name('HrBSIT303');
Route::get('/HrBSIT401', [HRBSITController::class, 'showBSIT401'])->name('HrBSIT401');
Route::get('/HrBSIT402', [HRBSITController::class, 'showBSIT402'])->name('HrBSIT402');
Route::get('/HrBSIT403', [HRBSITController::class, 'showBSIT403'])->name('HrBSIT403');


//BSHM

Route::get('/HM101', [BSHMController::class, 'showBSHM101'])->name('HM101');
Route::get('/HM102', [BSHMController::class, 'showBSHM102'])->name('HM102');
Route::get('/HM103', [BSHMController::class, 'showBSHM103'])->name('HM103');

Route::get('/HM201', [BSHMController::class, 'showBSHM201'])->name('HM201');
Route::get('/HM202', [BSHMController::class, 'showBSHM202'])->name('HM202');
Route::get('/HM203', [BSHMController::class, 'showBSHM203'])->name('HM203');

Route::get('/HM301', [BSHMController::class, 'showBSHM301'])->name('HM301');
Route::get('/HM302', [BSHMController::class, 'showBSHM302'])->name('HM302');
Route::get('/HM303', [BSHMController::class, 'showBSHM303'])->name('HM303');

Route::get('/HM401', [BSHMController::class, 'showBSHM401'])->name('HM401');
Route::get('/HM402', [BSHMController::class, 'showBSHM402'])->name('HM402');
Route::get('/HM403', [BSHMController::class, 'showBSHM403'])->name('HM403');

Route::get('/CS101', [BSCSController::class, 'showBSCS101'])->name('CS101');
Route::get('/CS102', [BSCSController::class, 'showBSCS102'])->name('CS102');
Route::get('/CS103', [BSCSController::class, 'showBSCS103'])->name('CS103');
Route::get('/CS201', [BSCSController::class, 'showBSCS201'])->name('CS201');
Route::get('/CS202', [BSCSController::class, 'showBSCS202'])->name('CS202');
Route::get('/CS203', [BSCSController::class, 'showBSCS203'])->name('CS203');
Route::get('/CS301', [BSCSController::class, 'showBSCS301'])->name('CS301');
Route::get('/CS302', [BSCSController::class, 'showBSCS302'])->name('CS302');
Route::get('/CS303', [BSCSController::class, 'showBSCS303'])->name('CS303');
Route::get('/CS401', [BSCSController::class, 'showBSCS401'])->name('CS401');
Route::get('/CS402', [BSCSController::class, 'showBSCS402'])->name('CS402');
Route::get('/CS403', [BSCSController::class, 'showBSCS403'])->name('CS403');
