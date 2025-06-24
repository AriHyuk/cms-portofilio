<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    // GET /api/hero
    public function index()
    {
        // Ambil hero section terbaru (atau first, kalau cuma 1 record)
        $hero = HeroSection::latest()->first();

        return response()->json($hero);
    }

    // (Opsional) GET /api/hero/{id} - untuk fetch by ID
    public function show($id)
    {
        return response()->json(HeroSection::findOrFail($id));
    }

    // (Opsional) PUT/PATCH /api/hero/{id} - update hero section (untuk kebutuhan admin/API khusus)
    public function update(Request $request, $id)
    {
        $hero = HeroSection::findOrFail($id);

        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'subtitle' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'cta_label' => 'nullable|string|max:255',
            'cta_url' => 'nullable|string|max:255',
            'image_path' => 'nullable|string',
        ]);

        $hero->update($data);

        return response()->json([
            'message' => 'Hero Section updated successfully.',
            'hero' => $hero,
        ]);
    }
}

