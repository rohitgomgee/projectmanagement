<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\Rule;

class AttributeController extends Controller
{
    /**
     * Display a listing of the attributes.
     */
    public function index(): JsonResponse
    {
        return response()->json(Attribute::all());
    }

    /**
     * Store a newly created attribute in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:attributes,name',
            'type' => ['required', Rule::in(['text', 'date', 'number', 'select'])],
        ]);

        $attribute = Attribute::create($validated);
        return response()->json($attribute, 201);
    }

    /**
     * Display the specified attribute.
     */
    public function show(Attribute $attribute): JsonResponse
    {
        return response()->json($attribute);
    }

    /**
     * Update the specified attribute in storage.
     */
    public function update(Request $request, Attribute $attribute): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'sometimes|required|string|unique:attributes,name,' . $attribute->id,
            'type' => ['sometimes', 'required', Rule::in(['text', 'date', 'number', 'select'])],
        ]);

        $attribute->update($validated);
        return response()->json($attribute);
    }

    /**
     * Remove the specified attribute from storage.
     */
    public function destroy(Attribute $attribute): JsonResponse
    {
        $attribute->delete();
        return response()->json(['message' => 'Attribute deleted successfully']);
    }
}
