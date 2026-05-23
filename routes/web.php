<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'fr', 'ar'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/dashboard', function () {
    $user = auth()->user();
    if ($user->role === 'patient') {
        $stats = [
            'total_appointments' => \App\Models\Appointment::where('patient_id', $user->id)->count(),
            'pending_appointments' => \App\Models\Appointment::where('patient_id', $user->id)->where('status', 'pending')->count(),
            'confirmed_appointments' => \App\Models\Appointment::where('patient_id', $user->id)->where('status', 'confirmed')->count(),
        ];
    } elseif ($user->role === 'doctor') {
        $stats = [
            'total_appointments' => \App\Models\Appointment::where('doctor_id', $user->id)->count(),
            'pending_appointments' => \App\Models\Appointment::where('doctor_id', $user->id)->where('status', 'pending')->count(),
            'total_patients' => \App\Models\Appointment::where('doctor_id', $user->id)->distinct('patient_id')->count('patient_id'),
        ];
    } else {
        $stats = [
            'total_appointments' => \App\Models\Appointment::count(),
            'pending_appointments' => \App\Models\Appointment::where('status', 'pending')->count(),
            'total_patients' => \App\Models\User::where('role', 'patient')->count(),
            'total_doctors' => \App\Models\User::where('role', 'doctor')->count(),
        ];
    }
    return view('dashboard', compact('stats'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('appointments', \App\Http\Controllers\AppointmentController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
