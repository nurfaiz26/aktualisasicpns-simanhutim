<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserDataRequest;
use App\Http\Requests\UpdateUserDataRequest;
use App\Models\UserData;

class UserDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserDataRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserData $userData)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserData $userData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserDataRequest $request, UserData $userData)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserData $userData)
    {
        //
    }
}
