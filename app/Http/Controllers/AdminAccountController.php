<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminAccountController extends Controller
{
    /**
     * Show the form for creating a new admin account.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.create_admin');
    }

    /**
     * Store a newly created admin account in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_type' => 'admin',
        ]);

        
        return redirect()->route('admin.dashboard')->with('success', 'Admin account created successfully.');
    }
}
