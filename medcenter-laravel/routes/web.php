<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('login');
})->name('login');

Route::get('/register', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return view('register');
})->name('register');

Route::get('/dashboard', function () {
    $user = Auth::user();
    $appointments = $user->appointments()
        ->with('doctor')
        ->orderBy('appointment_date')
        ->get();

    $upcomingAppointment = $appointments->first(function ($appointment) {
        return $appointment->status === 'programada'
            && $appointment->appointment_date->isFuture();
    });

    $summary = [
        'upcoming' => $appointments->filter(function ($appointment) {
            return $appointment->status === 'programada'
                && $appointment->appointment_date->isFuture();
        })->count(),
        'completed' => $appointments->where('status', 'completada')->count(),
        'cancelled' => $appointments->where('status', 'cancelada')->count(),
    ];

    return view('dashboard', compact('user', 'upcomingAppointment', 'summary'));
})->middleware('auth')->name('dashboard');

// POST login
Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    return back()
        ->with('login_error', 'Credenciales incorrectas')
        ->onlyInput('email');
})->name('login.post');

// POST register
Route::post('/register', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|string',
        'password' => 'required|confirmed|min:6',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'password' => $validated['password'],
    ]);

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('dashboard');
})->name('register.post');
