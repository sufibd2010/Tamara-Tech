<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BioRequest;
use App\Services\BioService;
use Illuminate\Http\Request;

class BioControlelr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BioService $bioService)
    {
        return response()->json($bioService->getIndex());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BioRequest $request, BioService $bioService)
    {
        // Here we are using the createBio() method of the BioService class to create a new bio. 
        $createBio = $bioService->createBio($request);

        return response()->json($createBio);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, BioService $bioService)
    {
        // Here we are using the findBio() method of the BioService class to find a bio by id. 
        return response()->json($bioService->findBio($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,  BioService $bioService)
    {
        // Here we are using the updateBio() method of the BioService class to update a bio by id.
        return response()->json($bioService->updateBio($request,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, BioService $bioService)
    {
        // Here we are using the deleteBio() method of the BioService class to delete a bio by id.
        return response()->json($bioService->deleteBio($id));
    }
}
