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
use App\Http\Controllers\HrAdminController;

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

//New

use App\Http\Controllers\ConsultationController;
Route::get('/student/calendar', function () {
    return view('student.StudentCalendar');
})->name('student.calendar');

// Route for the Student History view
Route::get('/student/history', function () {
    return view('student.StudentHistory');
})->name('student.history');
Route::get('/college-consult', function () {
    return view('student.consultation.CollegeConsult');
})->name('college.consult');

Route::get('/highschool-consult', function () {
    return view('student.consultation.HSchoolConsult');
})->name('highschool.consult');




Route::get('/student/consultation/college', [ConsultationController::class, 'showCollegeConsultation'])->name('college.consultation');
Route::get('/student/consultation/highschool', [ConsultationController::class, 'showHSchoolConsultation'])->name('highschool.consultation');
Route::post('/student/consultation/submit', [ConsultationController::class, 'submitConsultation'])->name('consultation.submit');

// Approval routes

Route::get('/dp-head/approval/{id}', [ConsultationController::class, 'dpHeadApproval'])->name('dpHead.approval');
Route::get('/admin-ctation/approval/{id}', [ConsultationController::class, 'adminCtationApproval'])->name('adminCtation.approval');

// Calendar routes
Route::get('/admin/calendar', [ConsultationController::class, 'adminCalendar'])->name('admin.calendar');
Route::get('/dp-head/calendar', [ConsultationController::class, 'dpCalendar'])->name('dp.calendar');
Route::get('/student/calendar', [ConsultationController::class, 'studentCalendar'])->name('student.calendar');

// History routes
Route::get('/admin/history', [ConsultationController::class, 'adminHistory'])->name('admin.history');
Route::get('/dp-head/history', [ConsultationController::class, 'dpHistory'])->name('dp.history');
Route::get('/student/history', [ConsultationController::class, 'studentHistory'])->name('student.history');

Route::post('/consultation/accept/{id}', [ConsultationController::class, 'accept'])->name('consultation.accept');
Route::post('/consultation/decline/{id}', [ConsultationController::class, 'decline'])->name('consultation.decline');


Route::get('/dp-head/approval', [ConsultationController::class, 'dpHeadApproval'])->name('dpHead.approval');
Route::get('/admin-ctation/approval', [ConsultationController::class, 'adminCtationApproval'])->name('adminCtation.approval');

Route::post('/busy-slot', [ConsultationController::class, 'storeBusySlot'])->name('busySlot.store');
Route::post('/busy-slot', [ConsultationController::class, 'storeBusySlot'])->name('busySlot.store');
Route::get('/student/history', [ConsultationController::class, 'studentHistory'])->name('student.history');


//END
use App\Http\Controllers\StudentConsultationController;

Route::prefix('consultation')->group(function () {
    Route::get('/', [StudentConsultationController::class, 'pickConsultation'])->name('consultation.pick');
});

Route::get('/consultation', function () {
    return view('student.StudentPickConsultation');
})->name('consultation.pick');

Route::get('/consultation', function () {
    return view('student.StudentPickConsultation');
});



Route::get('/consultation', [StudentConsultationController::class, 'pickConsultation'])->name('consultation.pick');

//LOGIN AND REGISTER//

// Show the login form (GET request)
Route::get('/', [AuthController::class, 'index'])->name('login');

// Handle the login form submission (POST request)
Route::post('/', [AuthController::class, 'login'])->name('login.submit');

// Handle logout (POST request)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/register', [StudentController::class, 'create'])->name('students.create');
Route::post('/registration', [StudentController::class, 'store'])->name('students.store');


Route::get('/register',[AuthController::class,'registration'])->name('registration');
Route::post('/register',[AuthController::class,'register'])->name('register');


// Student routes

//new registration web (harenz)
Route::get('/student/dashboard/{id}', [StudentController::class, 'dashboard'])->name('student.dashboard')->middleware('auth');
//hanggang dito

Route::get('/student.student.dashboard', function () {return view('student.student.dashboard');
})->middleware('auth')->name('student.student.dashboard');

//for student number

Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('dashboard');



// Student routes
Route::get('/evaluation', function () {
    return view('faculty.index');
})->name('evaluation');

Route::get('/CollegeConsult', function () {
    return view('consultation.college.consult');
})->name('CollegeConsult');


/*/
//list of teachers
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/faculty/{department}', [FacultyController::class, 'show']);


Route::get('/facultyhighschool', [FacultyControllerHighschool::class, 'index'])->name('facultyhighschool.index');
Route::get('/facultyhighschool/{departmenthighschool}', [FacultyControllerHighschool::class, 'show']);
/*/
Route::get('/faculty/{grade_level_section}', [FacultyController::class, 'index'])->name('faculty.index');
Route::get('/facultyhighschool/{grade_level_section}', [FacultyController::class, 'index'])->name('facultyhighschool.index');
Route::get('/faculty/{grade_level_section}/{department}', [FacultyController::class, 'show'])->name('faculty.show');


Route::get('/evaluation-form', function () {return view('student.evaluation.evaluation-form');})->name('evaluation-form');

Route::get('/evaluation-form', [EvaluationController::class, 'create'])->name('evaluation-form');
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



Route::get('/Appointment', function () {
    return view('student.consultation.consult');
})->name('Appointment');



Route::get('/highschool', function () {
    return view('student.consultation.highschool');
})->name('highschool');



Route::get('/StudentSettings', function () {
    return view('student.StudentSettings');
})->name('StudentSettings');


Route::get('/HrAdminDashboard', [HrAdminController::class, 'index'])->name('HrAdminDashboard')->middleware('auth');

Route::get('/HrStudentList', function () {
    return view('hr.HrStudentList');
})->name('HrStudentList');

Route::get('/HrBSIT', function () {
    return view('hr.HrCollegeBSIT.HrBSIT');
})->name('HrBSIT');

Route::get('/HrCollegeCourse', function () {
    return view('hr.HrCollegeCourse');
})->name('HrCollegeCourse');




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
//added by harenz
Route::get('/HrRecentEvaluations', function () {
    return view('hr.HrRecentEvaluations');
})->name('HrRecentEvaluations');

Route::get('/HrSettings', function () {
    return view('hr.HrSettings');
})->name('HrSettings');

//route for the hr notifications harenz
Route::get('/HrNotification', [HrAdminController::class, 'showNotifications'])->name('HrNotification');
// Route for viewing recent evaluations harenz
Route::get('/hr.HrRecentEvaluations', [HrAdminController::class, 'showRecentEvaluations'])->name('HrRecentEvaluations');




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

