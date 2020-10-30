<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employ;
use App\Http\Resources\EmployCollection;
use App\Http\Resources\Employ as EmployResource;

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
        $employ = Employ::create($request->all());
        
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
}
