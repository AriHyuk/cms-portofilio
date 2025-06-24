<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;

class AboutSectionController extends Controller
{
    // GET /api/about-section
    public function index()
    {
        // Ambil section terbaru (atau first jika cuma satu record)
        $about = AboutSection::latest()->first();

        return response()->json($about);
    }
}

