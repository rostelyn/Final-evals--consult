<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (Auth::attempt($credentials)) {
            // Get the authenticated user
            $user = Auth::user();

            // Redirect based on the user's role
            switch ($user->username) {
                case 'dphead':
                    return redirect()->intended('DpHeadDashboard');
                case 'hradmin':
                    return redirect()->intended('HrDashboard');
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
        Auth::logout();
        return redirect('/login');
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
