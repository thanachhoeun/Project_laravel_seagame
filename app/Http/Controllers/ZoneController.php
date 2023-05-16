<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreZoneRequest;
use App\Http\Resources\ShowZoneResource;
use App\Http\Resources\ZoneResource;
use App\Models\Zone;
use Illuminate\Http\Request;

class ZoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $zone = Zone::all();
        $zone = ZoneResource::collection($zone);
        return response()->json(['success' => true, 'data' => $zone],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreZoneRequest $request)
    {
        $zone = Zone::store($request);
        return response()->json(["success" => true,"data"=>$zone],201);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $zone = Zone::find($id);
        $zone = new ShowZoneResource($zone);
        return response()->json(["success" => true,"data"=>$zone],201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreZoneRequest $request, string $id)
    {
        $zone = Zone::store($request, $id);
        return response()->json(["success" => true,"data"=>$zone],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $zone = Zone::find($id);
        $zone->delete();
        return response()->json(["success" => true,"data"=>$zone],201); 
    }
}
