<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;
use App\Employ;
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

    public function registersByEmploy($identification)
    {
        $employ= Employ::whereIdentification($identification)->first();
        $this->authorize('search',$employ);
        $registers=$employ->registers;
        return response()->json(RegisterResource::collection($registers),200);
    }
    
    public function store(Request $request, $identification)
    {

        $this->authorize('create',Register::class);
        $request->validate([
            'checkIn' => 'required',
            'checkOut' => 'nullable',
        ],self::$messages);
        $employ= Employ::whereIdentification($identification)->first();
        $register = $employ->registers()->save(new Register([
            'checkIn' => $request->get('checkIn'),
            'checkOut' => $request->get('checkOut'),
            ]));
        
        return response()->json(new RegisterResource($register), 201);
    }
    
    public function update(Request $request, $identification, Register $register )
    {
        $this->authorize('update',$register);
      
        $employ= Employ::whereIdentification($identification)->first();
        $employ->registers()->update($request->all());
        
        return response()->json(new RegisterResource($register), 200);
    }
    
    public function delete(Register $register)
    {
        $this->authorize('delete',$register);
        $register->delete();
        
        return response()->json(null, 204);
    }
}
