<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationControlelr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(LocationService $locationService)
    {
        // Here we are using the getIndex() method of the LocationService class to get all locations.
        return response()->json($locationService->getIndex());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LocationRequest $request, LocationService $locationService)
    {
        // Here we are using the createLocation() method of the LocationService class to create a new location. 
        $createLocation = $locationService->createLocation($request);
        
        return response()->json($createLocation);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, LocationService $locationService)
    {
        // Here we are using the findLocation() method of the LocationService class to find a location by id.   
        return response()->json($locationService->findLocation($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, LocationService $locationService)
    {
        // Here we are using the updateLocation() method of the LocationService class to update a location by id.
        return response()->json($locationService->updateLocation($request,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, LocationService $locationService)
    {
        // Here we are using the deleteLocation() method of the LocationService class to delete a location by id.
        return response()->json($locationService->deleteLocation($id));
    }
}
