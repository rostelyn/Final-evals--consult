<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Evaluation;
use Illuminate\Http\Request;

class HrAdminController extends Controller
{
    // Show HrAdmin Dashboard
    public function index()
    {
        // In your controller (e.g., HrDashboardController.php)

// Get the total number of students
$studentCount = Student::count();

// Get the total number of evaluations (where evaluation is completed, i.e., not pending)
$evaluatedEvaluationsCount = Evaluation::where('status', '!=', 'pending')->count();

// Get the number of pending evaluations (evaluations with status "pending")
$pendingEvaluationsCount = $studentCount - $evaluatedEvaluationsCount; // Subtract evaluated students from total students

// Get the number of recent evaluations (completed evaluations that are marked as 'evaluated')
$recentEvaluationsCount = Evaluation::where('status', '!=', 'pending')->count(); // All completed evaluations, regardless of when they were done

// Get the total number of evaluations (completed or not)
$evaluationCount = Evaluation::count();

// Get the notifications (e.g., evaluations pending more than 7 days)
$notifications = Evaluation::where('status', 'pending')
                            ->whereDate('created_at', '<', now()->subDays(7))
                            ->get(); // Get all evaluations that are overdue

$notificationCount = $notifications->count();

// Pass the counts and notifications to the view
return view('hr.HrDashboard', compact(
    'studentCount', 
    'evaluationCount', 
    'recentEvaluationsCount', 
    'pendingEvaluationsCount', 
    'notificationCount', 
    'notifications'
));

    }
}
