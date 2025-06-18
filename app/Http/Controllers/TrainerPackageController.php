<?php

namespace App\Http\Controllers;

use App\Models\TrainerPackage;

class TrainerPackageController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Getting users successful',
            'sessions' => TrainerPackage::all()
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
    public function store(StoreTrainerPackageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TrainerPackage $trainerPackage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrainerPackage $trainerPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrainerPackageRequest $request, TrainerPackage $trainerPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrainerPackage $trainerPackage)
    {
        //
    }
}
