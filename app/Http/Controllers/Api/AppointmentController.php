<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        return response()->json(Appointment::with(['patient', 'doctor', 'service'])->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date',
            'time' => 'required',
            'notes' => 'nullable|string'
        ]);

        $validated['status'] = 'pending';
        $appointment = Appointment::create($validated);

        return response()->json($appointment, 201);
    }
}
