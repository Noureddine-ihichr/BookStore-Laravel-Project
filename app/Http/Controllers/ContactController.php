<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'number' => 'required|string',
            'message' => 'required|string',
        ]);

        $userId = Auth::id();

        Message::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'number' => $validatedData['number'],
            'message' => $validatedData['message'],
            'user_id' => $userId,
        ]);


        $request->session()->flash('messageSent', true);

        return redirect()->back();
    }
}
