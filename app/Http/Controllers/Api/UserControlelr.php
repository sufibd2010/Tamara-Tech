<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserControlelr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserService $userService)
    {   
        // Here we are using the getIndex() method of the UserService class to get all users.
        return response()->json($userService->getIndex());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, UserService $userService)
    {
        // Here we are using the createUser() method of the UserService class to create a new user.
        $createUser = $userService->createUser($request);

        return response()->json($createUser);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, UserService $userService)
    {
        // Here we are using the findUser() method of the UserService class to find a user by id.
        return response()->json($userService->findUser($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserService $userService, string $id)
    {
        // Here we are using the updateUser() method of the UserService class to update a user by id.
        return response()->json($userService->updateUser($request,$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, UserService $userService)
    {
        // Here we are using the deleteUser() method of the UserService class to delete a user by id.
        return response()->json($userService->deleteUser($id));
    }
}
