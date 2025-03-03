<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        // Start the query with eager loading
        $query = Project::query()->with('attributes.attribute');

        // Apply Filters if Provided
        if ($request->has('filters')) {
            foreach ($request->filters as $key => $value) {
                if (in_array($key, ['name', 'status'])) {
                    $query->where($key, 'LIKE', "%$value%");
                } else {
                    $query->whereHas('attributes', function ($q) use ($key, $value) {
                        $q->whereHas('attribute', function ($q2) use ($key, $value) {
                            $q2->where('name', $key);
                            $q2->where('type', $value);
                        });
                    });
                }
            }
        }

        // Execute the filtered query
        $projects = $query->get();

        return response()->json($projects);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string|max:50',
        ]);

        $project = Project::create($validated);
        return response()->json($project, 201);
    }

    public function show($id)
    {
        $project = Project::with('attributes.attribute')->findOrFail($id);
        return response()->json($project);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'status' => 'sometimes|string|max:50',
        ]);

        $project = Project::findOrFail($id);
        $project->update($validated);
        return response()->json($project);
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();
        return response()->json(['message' => 'Project deleted successfully']);
    }
}
