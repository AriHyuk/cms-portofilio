<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // GET /api/projects
    public function index()
    {
        return response()->json(Project::latest()->get());
    }

    // GET /api/projects/{id}
    public function show($id)
    {
        return response()->json(Project::findOrFail($id));
    }

    // POST /api/projects
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'technologies' => 'nullable|array',
            'thumbnail' => 'nullable|string',
            'code_url' => 'nullable|string',
            'live_demo_url' => 'nullable|string',
            'is_featured' => 'boolean',
        ]);

        // Jika technologies dari frontend string (JSON), decode
        if (isset($data['technologies']) && is_string($data['technologies'])) {
            $data['technologies'] = json_decode($data['technologies'], true);
        }

        $project = Project::create($data);

        return response()->json([
            'message' => 'Project created successfully.',
            'project' => $project,
        ], 201);
    }

    // PUT/PATCH /api/projects/{id}
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $data = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'category' => 'sometimes|required|string|max:255',
            'short_description' => 'nullable|string',
            'full_description' => 'nullable|string',
            'technologies' => 'nullable|array',
            'thumbnail' => 'nullable|string',
            'code_url' => 'nullable|string',
            'live_demo_url' => 'nullable|string',
            'is_featured' => 'boolean',
        ]);

        // Jika technologies dari frontend string (JSON), decode
        if (isset($data['technologies']) && is_string($data['technologies'])) {
            $data['technologies'] = json_decode($data['technologies'], true);
        }

        $project->update($data);

        return response()->json([
            'message' => 'Project updated successfully.',
            'project' => $project,
        ]);
    }

    // DELETE /api/projects/{id}
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully.'
        ]);
    }
}
