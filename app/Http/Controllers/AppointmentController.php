<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentCreated;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with(['patient', 'doctor', 'service'])->latest();

        if (auth()->user()->role === 'patient') {
            $query->where('patient_id', auth()->id());
        }

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->whereHas('patient', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })->orWhereHas('doctor', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })->orWhereHas('service', function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })->orWhere('date', 'like', '%' . $search . '%');
        }

        $appointments = $query->paginate(10);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('appointments.partials.table', compact('appointments'))->render()
            ]);
        }

        $patients = User::where('role', 'patient')->get();
        $doctors = User::where('role', 'doctor')->get();
        $services = Service::all();

        return view('appointments.index', compact('appointments', 'patients', 'doctors', 'services'));
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

        // Send confirmation email
        Mail::to($appointment->patient->email)->queue(new AppointmentCreated($appointment));

        return redirect()->route('appointments.index')->with('success', __('messages.appointment_created_success'));
    }

    public function update(Request $request, Appointment $appointment)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,cancelled',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        $appointment->update($validated);

        return redirect()->route('appointments.index')->with('success', __('messages.appointment_updated_success'));
    }

    public function destroy(Appointment $appointment)
    {
        if (auth()->user()->role === 'patient' && $appointment->patient_id !== auth()->id()) {
            abort(403, __('messages.unauthorized_action'));
        }

        $appointment->delete();

        return redirect()->route('appointments.index')->with('success', __('messages.appointment_deleted_success'));
    }
}
