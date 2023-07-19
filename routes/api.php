<?php

use App\Http\Controllers\Api\UserControlelr;
use App\Http\Controllers\Api\BioControlelr;
use App\Http\Controllers\Api\LocationControlelr;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
 We will use apiResource() method to create a resource controller for our models.
 This method will create a controller with all the necessary methods to perform CRUD operations on the models.
 The apiResource() method accepts two parameters:
 The first parameter is the name of the resource.
 The second parameter is the name of the controller that will be created.
 The apiResource() method will create the following routes for us: for example (User Model)
 GET /users - index method
 POST /users - store method
 GET /users/{user} - show method
 PUT /users/{user} - update method
 DELETE /users/{user} - destroy method
 Route::apiResource('users', UserController::class);

--------------------------------------------------------------------------

 We are using prefix() method to prefix all the routes in the group with v1, so that we can easily manage the versions of our API.
 We are using group() method to group all the routes in the group, so that we can easily manage the routes of our API.
 
*/
Route::group(['prefix' => 'v1'], function () {

    Route::apiResource('users', UserControlelr::class); // Resource Controller for User Model (CRUD)
    Route::apiResource('bio', BioControlelr::class); // Resource Controller for Bio Model (CRUD)
    Route::apiResource('locations', LocationControlelr::class); // Resource Controller for Location Model (CRUD)

});
