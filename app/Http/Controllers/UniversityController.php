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
            return error_response($th);
        }
    }

    /**
     * Display the specified resource by ID.
     */
    public function show($id)
    {
        return University::findOrFail($id); // Find the university by ID or fail
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
            return error_response($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(University $university)
    {
        return $university->delete();
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
