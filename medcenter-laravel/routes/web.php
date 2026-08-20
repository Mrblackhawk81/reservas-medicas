<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::get('/dashboard', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }

    $user = Auth::user();

    $upcomingAppointment = $user->appointments()
        ->where('status', 'programada')
        ->where('appointment_date', '>', now())
        ->orderBy('appointment_date')
        ->with('doctor')
        ->first();

    $upcomingCount = $user->appointments()
        ->where('status', 'programada')
        ->where('appointment_date', '>', now())
        ->count();

    $completedCount = $user->appointments()
        ->where('status', 'completada')
        ->count();

    $cancelledCount = $user->appointments()
        ->where('status', 'cancelada')
        ->count();

    return view('dashboard', [
        'user' => $user,
        'upcomingAppointment' => $upcomingAppointment,
        'summary' => [
            'upcoming' => $upcomingCount,
            'completed' => $completedCount,
            'cancelled' => $cancelledCount,
        ],
    ]);
})->name('dashboard');

Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user) {
        return back()
            ->with('login_error', 'Credenciales incorrectas')
            ->onlyInput('email');
    }

    if (!Hash::check($request->password, $user->password)) {
        return back()
            ->with('login_error', 'Credenciales incorrectas')
            ->onlyInput('email');
    }

    Auth::login($user, $request->has('remember'));
    $request->session()->regenerate();

    return redirect('/dashboard');
})->name('login.post');

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
        'password' => Hash::make($validated['password']),
    ]);

    Auth::login($user);
    $request->session()->regenerate();

    return redirect()->route('dashboard');
})->name('register.post');
