<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return University::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "name" => "required|string",
            ]);
            $university = new University();
            $university->name = $request->name;
            $university->save();
            return response()->json(["message" => "University created successfully"], 201);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

/**
 * Display the specified resource by ID.
 */
public function show($id)
{
    try {
        $university = University::findOrFail($id); // Find the university by ID or fail
        return response()->json($university); // Return the university data
    } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
        return response()->json(["message" => "University not found"], 404); // Return 404 if not found
    } catch (\Throwable $th) {
        return response()->json(["message" => $th->getMessage()], 500); // Return other errors
    }
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, University $university)
    {
        try {
            $request->validate([
                "name" => "required|string"
            ]);
            $university->name = $request->name;
            $university->save();
            return response()->json(["message" => "University updated successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        try {
            $university->delete();
            return response()->json(["message" => "University deleted successfully"], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
    public function getMajors($id)
{
    $university = University::with('majors')->find($id);

    if (!$university) {
        return response()->json(['message' => 'University not found'], 404);
    }

    return response()->json($university->majors);
}
}
