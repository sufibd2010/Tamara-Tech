<?php

namespace App\Services;
 
use App\Models\Location;
use Illuminate\Http\Request;
 
class LocationService
{
    public function getIndex() {
        return Location::paginate(10);
    }
    public function createLocation(Request $request): Location
    {
        // Create Location
        $location = Location::create([
            'nickname' => $request->name,
            'personal_info' => $request->email,
            'user_id' => $request->user_id,
        ]);
 
 
        return $location;
    }

    public function findLocation($id): Location
    {
        return Location::find($id);
    }

    public function updateLocation(Request $request, $id)
    {
        // Create Location
        $location = Location::findOrFail($id)->update([
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
        ]);
 
        return $location;
    }

    public function deleteLocation($id){
        Location::findOrFail($id)->delete();

        return ['success' => true, 'message' => 'Location deleted successfully'];
    }
}