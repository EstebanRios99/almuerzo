<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Http\Resources\RegisterCollection;
use App\Http\Resources\Register as RegisterResource;

class RegisterController extends Controller
{
    public function index()
    {
        return new RegisterCollection(Register::all());
    }
    
    public function show(Register $register)
    {
        return response()->json(new RegisterResource($register),200);
    }
    
    public function store(Request $request)
    {
        $register = Register::create($request->all());
        
        return response()->json(new RegisterResource($register), 201);
    }
    
    public function update(Request $request, Register $register)
    {
        $register->update($request->all());
        
        return response()->json(new RegisterResource($register), 200);
    }
    
    public function delete(Register $register)
    {
        $register->delete();
        
        return response()->json(null, 204);
    }
}
