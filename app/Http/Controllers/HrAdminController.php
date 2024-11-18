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
        // Count all students
        $studentCount = Student::count();

        // Count all evaluations (all status)
        $evaluationCount = Evaluation::count();

        // Count pending evaluations
        $pendingEvaluationsCount = $studentCount - $evaluationCount;


        // **Fetch the latest 10 evaluations (evaluated or newly submitted)**
        $recentEvaluations = Evaluation::orderBy('created_at', 'desc') // Sort by submission time
            ->take(10) // Get the most recent 10 entries
            ->get();

        // Count recent evaluations
        $recentEvaluationsCount = $recentEvaluations->count();

        // Fetch the latest 10 notifications for pending evaluations
        $notifications = Evaluation::where('status', 'pending')
            ->orderBy('created_at', 'desc') // Sort by the most recent creation time
            ->take(10) // Limit to the latest 10
            ->get();

        // Count notifications
        $notificationCount = $notifications->count();

        // Pass data to the view
        return view('hr.HrAdminDashboard', compact(
            'studentCount',
            'evaluationCount',
            'recentEvaluationsCount',
            'recentEvaluations',
            'pendingEvaluationsCount',
            'notificationCount',
            'notifications'
        ));
    }
    //i added harenz
    public function showNotifications(Request $request)
    {
        // Get the filter parameters
        $teacherName = $request->input('teacher_name');
        $section = $request->input('section');
        $date = $request->input('date');

        // Build the query with filters
        $query = Evaluation::query();

        if ($teacherName) {
            $query->where('teacher_name', 'like', '%' . $teacherName . '%');
        }

        if ($section) {
            $query->where('section', 'like', '%' . $section . '%');
        }

        if ($date) {
            $query->whereDate('created_at', $date);
        }

        // Fetch the filtered notifications
        $notifications = $query->where('status', 'pending')
            ->orderBy('created_at', 'desc') // Sort by the most recent
            ->get();

        // Get the count of notifications
        $notificationCount = $notifications->count();

        // Return the view with the filtered notifications
        return view('hr.HrNotification', compact('notifications', 'notificationCount'));
    }


   
    public function showRecentEvaluations()
    {
        // Fetch the latest 10 evaluations (either evaluated or newly submitted)
        $recentEvaluations = Evaluation::orderBy('created_at', 'desc') // Sort by submission time
            ->take(10) // Get the most recent 10 entries
            ->get();

        // Count recent evaluations
        $recentEvaluationsCount = $recentEvaluations->count();

        // Pass the recent evaluations data to the view
        return view('hr.HrRecentEvaluations', compact('recentEvaluations', 'recentEvaluationsCount'));
    }

}
