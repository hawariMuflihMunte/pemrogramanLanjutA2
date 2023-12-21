<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('registration');
    }

    public function registration(Request $request)
    {
        $registration = $request->validate([
            'name' => ['required', 'string', 'regex:/^[A-Za-z .]+$/'],
            'username' => ['required', 'string', 'regex:/^[^0-9_][A-Za-z0-9_]*$/'],
            'email' => ['required', 'email:dns'],
            'password' => ['required']
        ]);

        if (
            User::where('name', $registration['name'])
                ->orWhere('username', $registration['username'])
                ->orWhere('email', $registration['email'])
                ->exists()
        ) {
            return back()->with('registration-error', 'Registrasi gagal!');
        }

        $user = User::create([
            'name' => $registration['name'],
            'username' => $registration['username'],
            'email' => $registration['email'],
            'password' => Hash::make($registration['password']),
        ]);

        if (!$user) {
            return redirect()->back()->with('registration-error', 'Registrasi gagal. Terjadi kesalahan!');
        }

        return redirect()->route('login')->with('register-success', 'Registrasi berhasil!');
    }
}
