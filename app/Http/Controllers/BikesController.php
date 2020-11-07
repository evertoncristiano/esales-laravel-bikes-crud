<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;

class BikesController extends Controller
{
    public function index()
    {
        $bikes = Bike::all();
        return response()->json($bikes);
    }

    public function show($id)
    {
        $bike = Bike::find($id);

        if(!$bike) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        return response()->json($bike);
    }

    public function store(Request $request)
    {
        $bike = new Bike();
        $bike->fill($request->all());
        $bike->save();

        return response()->json($bike, 201);
    }

    public function update(Request $request, $id)
    {
        $bike = Bike::find($id);

        if(!$bike) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        $bike->fill($request->all());
        $bike->save();

        return response()->json($bike);
    }

    public function destroy($id)
    {
        $bike = Bike::find($id);

        if(!$bike) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        $bike->delete();
    }

    public function updateDescription(Request $request, $id) {
        $bike = Bike::find($id);

        if(!$bike) {
            return response()->json([
                'message' => 'Record not found'
            ], 404);
        }

        $bike->description = $request->description;
        $bike->save();

        return response()->json($bike, 200);
    }
}
