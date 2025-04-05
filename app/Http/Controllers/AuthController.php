<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

        $user = Auth::attempt($validated);

        if (!$user) {
            return redirect()->back()->with('error', 'username dan password tidak valid');
        }

        return redirect()->route('dashboard.index')->with('success', 'berhasil login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('home');
    }
}
