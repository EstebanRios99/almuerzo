<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\UserCollection;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'could_not_create_token'], 500);
        }
        $user =JWTAuth::user();
        
        return response()->json(compact('token','user'));
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
                     
        $user = User::create([
            'name' => $request->get('name'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
            
        $token = JWTAuth::fromUser($user);
            
        return response()->json(new UserResource('user','token'),201);
    }
            
    public function getAuthenticatedUser()
    {
        try {
            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['message'], 404);
            }
        
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['message'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['message'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['message'], $e->getStatusCode());
        }
        return response()->json(new UserResource($user),200);
    }

    public function logout() 
    { 
        try { 
            JWTAuth::invalidate(JWTAuth::getToken());
            
            return response()->json([ 
                "status" => "success",
                 "message" => "User successfully logged out." 
                ], 200);
             } catch (JWTException $e) { 
                 // something went wrong whilst attempting to encode the token 
                 return response()->json(["message" => "No se pudo cerrar la sesión."
                ], 500); 
            }
        }
    }
