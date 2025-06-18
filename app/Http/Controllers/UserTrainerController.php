<?php

namespace App\Http\Controllers;

use App\Models\UserTrainer;

class UserTrainerController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Getting users successful',
            'userTrainers' => UserTrainer::all()
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
    public function store(StoreUserTrainerRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserTrainer $userTrainer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserTrainer $userTrainer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserTrainerRequest $request, UserTrainer $userTrainer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserTrainer $userTrainer)
    {
        //
    }
}
