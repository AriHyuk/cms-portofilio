<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    // GET /api/certificates
    public function index()
    {
        return response()->json(Certificate::latest()->get());
    }

    // GET /api/certificates/{id}
    public function show($id)
    {
        return response()->json(Certificate::findOrFail($id));
    }

    // POST /api/certificates
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'issuer' => 'required|string|max:255',
            'issued_at' => 'nullable|date',
            'image' => 'nullable|string',
            'certificate_url' => 'nullable|string',
        ]);

        $certificate = Certificate::create($data);

        return response()->json([
            'message' => 'Certificate created successfully.',
            'certificate' => $certificate,
        ], 201);
    }

    // PUT/PATCH /api/certificates/{id}
    public function update(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'issuer' => 'sometimes|required|string|max:255',
            'issued_at' => 'nullable|date',
            'image' => 'nullable|string',
            'certificate_url' => 'nullable|string',
        ]);

        $certificate->update($data);

        return response()->json([
            'message' => 'Certificate updated successfully.',
            'certificate' => $certificate,
        ]);
    }

    // DELETE /api/certificates/{id}
    public function destroy($id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->delete();

        return response()->json([
            'message' => 'Certificate deleted successfully.'
        ]);
    }
}

