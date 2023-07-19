<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UserService $userService)
    {
        // Here we are using the getIndex() method of the UserService class to get all users.
        $userData = $userService->getIndex();
        return view('welcome', compact('userData'));
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('welcome');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, UserService $userService)
    {
        // Here we are using the createUser() method of the UserService class to create a new user.
        $userService->createUser($request);

        return redirect()->back();    
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request , UserService $userService)
    {
        
        $user_id = $request->user_id;
        // Here we are using the findUser() method of the UserService class to find a user by id.
        $user = $userService->findUser($user_id);
        return view('welcome', compact('user'));
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('welcome');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id,  UserService $userService)
    {
        // Here we are using the updateUser() method of the UserService class to update a user by id.
        $userService->updateUser($request,$id);
         return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, UserService $userService)
    {
        // Here we are using the deleteUser() method of the UserService class to delete a user by id.
        $userService->deleteUser($id);
         return redirect()->back();
    }
}
