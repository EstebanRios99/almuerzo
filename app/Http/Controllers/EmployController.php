<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employ;

class EmployController extends Controller
{
    public function index()
    {
        return Employ::all();
    }
    
    public function show(Employ $employ)
    {
        return $employ;
    }
    
    public function store(Request $request)
    {
        $employ = Employ::create($request->all());
        
        return response()->json($employ, 201);
    }
    
    public function update(Request $request, Employ $employ)
    {
        $employ->update($request->all());
        
        return response()->json($employ, 200);
    }
    
    public function delete(Employ $employ)
    {
        $employ->delete();
        
        return response()->json(null, 204);
    }
}
