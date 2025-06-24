<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

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

        $appointment = Appointment::create($data);

        return response()->json([
            'message' => 'Appointment request submitted!',
            'appointment' => $appointment,
        ], 201);
    }
}

