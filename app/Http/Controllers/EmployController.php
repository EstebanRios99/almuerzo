<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employ;
use App\Http\Resources\EmployCollection;
use App\Http\Resources\Employ as EmployResource;
use App\Http\Resources\Register as RegisterResource;

class EmployController extends Controller
{
    public function index()
    {
        return new EmployCollection(Employ::all());
    }

    public function show(Employ $employ)
    {
        return response()->json(new EmployResource($employ),200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'identification' => 'required',
        ]);

        $employ = Employ::create([
            'identification' => $request->get('identification'),
            ]);

        return response()->json(new EmployResource ($employ), 201);
    }

    public function update(Request $request, Employ $employ)
    {
        
        $employ->update($request->all());

        return response()->json(new EmployResource($employ), 200);
    }

    public function delete(Employ $employ)
    {
        $employ->delete();

        return response()->json(null, 204);
    }

    public function registersByEmploy(Employ $employ)
    {
        //$employ=Employ::all();
        $registers=$employ->registers;
        return response()->json(RegisterResource::collection($registers),200);
    }
}
