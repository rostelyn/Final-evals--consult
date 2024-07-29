<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            // Redirect to the intended route after login
            return redirect()->intended(route('student.student-evaluation-consultation'));
        } else {
            return redirect()->back()->withErrors(['message' => 'Invalid username or password']);
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function registration(){
        return view('registration');
    }

    public function register(Request $request){
        $validate = $request->validate([
            'StudentId' => 'required|max:30',
            'name' => 'required|max:30',
            'age' => 'required|integer',
            'Outlook Email' => 'required|email|max:50',
            'Course/Strand' => 'required|max:30',
            'Grade Level & Section' => 'required|max:30',
            'password' => 'required|min:5|max:20'
        ]);

        $validate['password'] = bcrypt($request->password);  // Encrypt the password

        $user = User::create($validate);

        if ($user) {
            return redirect('/login');
        }
    }
}
