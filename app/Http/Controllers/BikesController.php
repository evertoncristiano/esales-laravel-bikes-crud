<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bike;

class BikesController extends ApiController
{
    public function index()
    {
        $bikes = Bike::all();
        return $this->successResponse($bikes);
    }

    public function show($id)
    {
        $bike = Bike::find($id);

        if(!$bike)
            return $this->notFoundResponse();

        return $this->successResponse($bike);
    }

    public function store(Request $request)
    {
        $bike = new Bike();
        $bike->fill($request->all());
        $bike->save();

        return $this->createdResponse($bike);
    }

    public function update(Request $request, $id)
    {
        $bike = Bike::find($id);

        if(!$bike)
            return $this->notFoundResponse();

        $bike->fill($request->all());
        $bike->save();

        return $this->successResponse($bike);
    }

    public function destroy($id)
    {
        $bike = Bike::find($id);

        if(!$bike)
            return $this->notFoundResponse();

        $bike->delete();
        return $this->successResponse();
    }

    public function updateDescription(Request $request, $id) {
        $bike = Bike::find($id);

        if(!$bike)
            return $this->notFoundResponse();

        $bike->description = $request->input('description');
        $bike->save();

        return $this->successResponse($bike);
    }
}
