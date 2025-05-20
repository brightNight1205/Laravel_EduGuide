<?php

namespace App\Http\Controllers;

use App\Models\Major;

use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()

    {

        return major::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "major_name" => "required|string",
                "university_id" => "required|integer|exists:universities,id"
            ]);

            $major = new Major(); // Capitalized class name
            $major->major_name = $request->major_name; // Correct field name
            $major->university_id = $request->university_id;
            $major->save();

            return response()->json(["message" => "Major created successfully"], 201);
        } catch (\Throwable $th) {
            return error_response($th);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return major::findOrFail($id); // Capitalized class name
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, major $major)
    {
        try {
            $request->validate([
                "major_name" => "required|string",
                "university_id" => "required|integer|exists:universities,id"
            ]);

            $major->major_name = $request->major_name; // Correct field name
            $major->university_id = $request->university_id;
            $major->save();

            return response()->json(["message" => "Major updated successfully"], 200);
        } catch (\Throwable $th) {
            return error_response($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(major $major)
    {
        try {
            $major->delete();
            return response()->json(["message" => "Major deleted successfully"], 200);
        } catch (\Throwable $th) {
            return error_response($th);
        }
    }

    public function getMajorsByUniversity($id)
    {
        try {
            $majors = Major::where('university_id', $id)->get();
            return response()->json($majors);
        } catch (\Throwable $th) {
            return error_response($th);
        }
    }
}
