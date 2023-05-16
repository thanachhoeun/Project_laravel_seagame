<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowUserResource;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        $user = UserResource::collection($user);
       return response()->json(['success' => true, 'data' => $user],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make( request('password')),
        ]);
        return response()->json(['success' => true, 'data' => $user],201);
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $user = new ShowUserResource($user);
        return response()->json(['success' => true, 'data' => $user],201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user -> update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')) ,
        ]);
        return response()->json(['success' => true, 'data' => $user],200);
    }
    
    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' => true, 'data' => $user],200);
    }
}
