<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class AppointmentController extends Controller
{
    // Ambil semua appointment (opsional, untuk dashboard admin)
    public function index()
    {
        return response()->json(Appointment::latest()->get());
    }

    // Simpan request meeting dari frontend
public function store(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'category' => 'nullable|string|max:255',
        'budget' => 'nullable|numeric',
        'details' => 'nullable|string',
    ]);

    // Cek duplikat
    $exists = Appointment::where('email', $request->email)
        ->where('status', 'pending')
        ->exists();

    if ($exists) {
        return response()->json([
            'error' => 'You already have a pending request!',
        ], 422);
    }

    $appointment = Appointment::create($data);

    // Kirim notifikasi email ke admin
    Mail::to('ariawl0209@gmail.com')->send(new \App\Mail\NewAppointmentNotification($appointment));

    return response()->json([
        'message' => 'Request sent! I will contact you soon.',
        'appointment' => $appointment,
    ], 201);
}

}

