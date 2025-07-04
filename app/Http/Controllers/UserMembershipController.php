<?php

namespace App\Http\Controllers;

use App\Models\UserMembership;

class UserMembershipController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Getting users successful',
            'userMemberships' => UserMembership::all()
        ], 200);  
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
    public function store(StoreUserMembershipRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserMembership $userMembership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserMembership $userMembership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserMembershipRequest $request, UserMembership $userMembership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserMembership $userMembership)
    {
        //
    }
}
