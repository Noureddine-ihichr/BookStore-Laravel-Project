<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function showRegistrationForm()
    {
        return view('register');
    }

    public function showAdminLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
           
            $user = Auth::user();
            session(['user_name' => $user->name]);
            session(['user_email' => $user->email]);
    
            if ($user->user_type == 'user') {
                return redirect()->route('home');
            } else {
                Auth::logout(); 
                return redirect()->back()->withErrors(['email' => 'User account required for this section.']);
            }
        } else {
            
            return redirect()->back()->withInput()->withErrors(['email' => 'The provided credentials are incorrect.']);
        }
    }
    

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->forget('user_name');
        $request->session()->forget('user_email');

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function register(Request $request)
    {
       
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'user_type' => 'required|in:user,admin', 
        ]);

      
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'user_type' => $validatedData['user_type'], 
        ]);

        
        auth()->login($user);

        
        return redirect()->route('login')->with('registered_email', $validatedData['email']);
    }


    public function adminLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->user_type == 'admin') {
                return redirect()->route('admin.dashboard');
            }
        }

        return redirect()->route('admin.login')->withErrors(['email' => 'Invalid credentials']);
    }

    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
