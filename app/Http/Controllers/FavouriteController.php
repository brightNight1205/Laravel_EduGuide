<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;

class FavouriteController extends Controller
{
    public function index()
    {
        return Favourite::all();
    }

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


    public function show(Favourite $favourite)
    {
        return Favourite::findOrFail($favourite);
    }


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
