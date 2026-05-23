<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $appointments = Appointment::with(['patient', 'doctor', 'service'])->get();
        return response()->json([
            'status' => 'success',
            'data' => $appointments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:users,id',
            'doctor_id' => 'required|exists:users,id',
            'service_id' => 'required|exists:services,id',
            'date' => 'nullable|date',
            'time' => 'nullable',
            'notes' => 'nullable|string'
        ]);

        $validated['status'] = 'pending';
        $appointment = Appointment::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Appointment request created successfully',
            'data' => $appointment
        ], 201);
    }
}
