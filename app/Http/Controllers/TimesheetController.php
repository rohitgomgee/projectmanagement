<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timesheet;

class TimesheetController extends Controller
{
    public function index()
    {
        $timesheets = Timesheet::with(['user', 'project'])->get();
        return response()->json($timesheets);
    }
    public function store(Request $request)
    {
        // Validate incoming request data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'project_id' => 'required|exists:projects,id',
            'task_name' => 'required|string|max:255',
            'date' => 'required|date',
            'hours' => 'required|numeric|min:0.5',
        ]);

        try {
            // Create the timesheet record with validated data
            $timesheet = Timesheet::create($validated);

            // Return the created timesheet with a success response
            return response()->json([
                'message' => 'Timesheet created successfully',
                'data' => $timesheet
            ], 201);
        } catch (\Exception $e) {
            // Handle any potential errors during the creation process
            return response()->json([
                'error' => 'Failed to create timesheet',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    public function show($id)
    {
        $timesheet = Timesheet::with(['user', 'project'])->findOrFail($id);
        return response()->json($timesheet);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'task_name' => 'sometimes|string|max:255',
            'date' => 'sometimes|date',
            'hours' => 'sometimes|numeric|min:0.5',
        ]);

        $timesheet = Timesheet::findOrFail($id);
        $timesheet->update($validated);
        return response()->json($timesheet);
    }

    public function destroy($id)
    {
        $timesheet = Timesheet::findOrFail($id);
        $timesheet->delete();
        return response()->json(['message' => 'Timesheet entry deleted successfully']);
    }
}
