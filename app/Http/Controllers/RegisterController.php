<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Http\Resources\RegisterCollection;
use App\Http\Resources\Register as RegisterResource;

class RegisterController extends Controller
{

    private static $messages = [
        'required' => 'El campo :attribute es obligatorio',
    ];

    public function index()
    {
        $this->authorize('viewAny',Register::class);
        return new RegisterCollection(Register::all());
    }
    
    public function show(Register $register)
    {
        $this->authorize('view',$register);
        return response()->json(new RegisterResource($register),200);
    }
    
    public function store(Request $request)
    {
        $this->authorize('create',Register::class);
        $request->validate([
            'checkIn' => 'required',
            'checkOut' => 'nullable',
            'employ_id' => 'exists:employs,id'
        ],self::$messages);
        $register = Register::create([
            'checkIn' => $request->get('checkIn'),
            'checkOut' => $request->get('checkOut'),
            'employ_id'=> $request->get('employ_id'),
            ]);
        
        return response()->json(new RegisterResource($register), 201);
    }
    
    public function update(Request $request, Register $register)
    {
        $this->authorize('update',$register);
        $register->update($request->all());
        
        return response()->json(new RegisterResource($register), 200);
    }
    
    public function delete(Register $register)
    {
        $this->authorize('delete',$register);
        $register->delete();
        
        return response()->json(null, 204);
    }
}
