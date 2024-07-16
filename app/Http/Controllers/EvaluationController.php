<?php

// app/Http/Controllers/EvaluationController.php
// app/Http/Controllers/EvaluationController.php
namespace App\Http\Controllers;
// app/Http/Controllers/EvaluationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation;

class EvaluationController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'teacher_name' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'teaching_performance' => 'required|string',
            'library' => 'required|string',
            'laboratory' => 'required|string',
            'comfort_room' => 'required|string',
            'canteen' => 'required|string',
        ]);

        Evaluation::create([
            'teacher_name' => $request->teacher_name,
            'subject' => $request->subject,
            'teaching_performance' => $request->teaching_performance,
            'library' => $request->library,
            'laboratory' => $request->laboratory,
            'comfort_room' => $request->comfort_room,
            'canteen' => $request->canteen,
        ]);

        return redirect()->back()->with('success', 'Evaluation submitted successfully!');
    }
}
