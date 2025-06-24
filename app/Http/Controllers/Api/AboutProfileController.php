<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutProfile;

class AboutProfileController extends Controller
{
    // GET /api/about-profile
    public function index()
    {
        // Ambil profile paling baru (atau bisa pakai first jika hanya 1 record)
        $profile = AboutProfile::latest()->first();

        return response()->json($profile);
    }
}

