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
            return redirect()->intended(route('HrDashboard'));
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

        
        $validate['password'] = bcrypt($request->password);

        $user = User::create($validate);

        if ($user) {
            return redirect('/login');
        }
    }
 
}