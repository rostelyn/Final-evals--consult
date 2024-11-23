<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use App\Models\Student;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        $student = Student::where('StudentId', $credentials['username'])->first();

        if ($student && Hash::check($credentials['password'], $student->password)) {
            Auth::login($student);
            return view('student.student-evaluation-consultation', compact('student'));
        }

        $user = User::where('username', $credentials['username'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
            Auth::login($user);
            
            switch ($user->username) {
                case 'dphead':
                    return redirect()->intended('DpHeadDashboard');
                case 'hradmin':
                    return redirect()->intended('HrAdminDashboard');
                case 'ctadmin':
                    return redirect()->intended('CTDashboard');
                default:
                    return redirect()->intended('defaultDashboard'); 
            }
        } else {
            return redirect()->back()->withErrors(['message' => 'Invalid username or password']);
        }
    }
    public function logout()
    {
        // Log out the user
        Auth::logout();
        return redirect('/');  // Redirect to login page after logout
    }


    public function registration()
    {
        return view('registration');
    }

    public function register(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'username' => 'required|string|unique:users',
            'password' => 'required|string|confirmed',
        ]);

        $validate['password'] = bcrypt($request->password);

        $user = User::create($validate);

        if ($user) {
            return redirect('/login');
        }
    }
}
