<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;
use function App\Helpers\error_response;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Favourite::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                "universitie_id" => "required|integer",
                "user_id" => "required|integer"
            ]);
            $favourite = new Favourite();
            $favourite->universitie_id = $request->universitie_id;
            $favourite->user_id = $request->user_id;
            $favourite->save();
            return response()->json(["message" => "Favourite created successfully"], 201);
        } catch (\Throwable $th) {
            return error_response($th);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Favourite $favourite)
    {
        return Favourite::findOrFail($favourite);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Favourite $favourite)
    {
        try {
            $request->validate([
                "universitie_id" => "required|integer",
                "user_id" => "required|integer"
            ]);
            $favourite->universitie_id = $request->universitie_id;
            $favourite->user_id = $request->user_id;
            $favourite->save();
            return response()->json(["message" => "Favourite updated successfully"], 200);
        } catch (\Throwable $th) {
            return error_response($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favourite $favourite)
    {
        try {
            $favourite->delete();
            return response()->json(["message" => "Favourite deleted successfully"], 200);
        } catch (\Throwable $th) {
            return error_response($th);
        }
    }
}
