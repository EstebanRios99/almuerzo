<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employ;
use App\Http\Resources\EmployCollection;
use App\Http\Resources\Employ as EmployResource;
use App\Http\Resources\Register as RegisterResource;

class EmployController extends Controller
{

    private static $messages = [
        'required' => 'El campo :attribute es obligatorio',
        'string' => 'El campo :attribute no es texto',
        'unique' => 'La cédula que ingreso ya existe'

    ];

    public function index()
    {
        $this->authorize('viewAny',Employ::class);
        return new EmployCollection(Employ::paginate(5));
    }

    public function show(Employ $employ)
    {
        $this->authorize('view',$employ);
        return response()->json(new EmployResource($employ),200);
    }

    public function searchEmploy($identification){
        $employ= Employ::whereIdentification($identification)->first();
        $this->authorize('search',$employ);
        
        return response()->json(new EmployResource($employ),200);
    }

    public function store(Request $request)
    {
        $this->authorize('create',Employ::class);
        $request->validate([
            'identification' => 'required|string|max:10|unique:employs',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255'
        ],self::$messages);

        $employ = Employ::create([
            'identification' => $request->get('identification'),
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            ]);

        return response()->json(new EmployResource ($employ), 201);
    }

    public function update(Request $request, Employ $employ)
    {
        $this->authorize('update',$employ);
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255'
        ],self::$messages);
        
        $employ->update($request->all());

        return response()->json(new EmployResource($employ), 200);
    }

    public function delete(Employ $employ)
    {
        $this->authorize('delete',$employ);
        $employ->delete();

        return response()->json(null, 204);
    }

    
}
