<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Routing\Controllers\Middleware;
use App\Models\User;
use App\Models\UserMembership;
use App\Models\Membership;
use App\Models\TrainerPackage;
use App\Models\UserTrainer;
use App\Models\PaymentLogs;
use Carbon\Carbon;

class PackageController
{

    // public static function middleware(){
    //     return [
    //         new Middleware('auth:sanctum', except: ['registerPackage'])
    //     ];
    // }
    
    public function registerPackage(Request $request)
    {
        $userCredentials = $request->validate([
            'full_name' => 'required|string|max:255|unique:users,full_name',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'age' => 'required|integer',
        ]);
        $request->validate([
            'package_type_id' => 'required|integer',
            'method' => 'required|string',
        ]);

        if($request->package_type == 'membership') $request->validate(['package_type_id' => 'required|exists:memberships,id']);
        else $request->validate(['package_type_id' => 'required|exists:trainer_packages,id']);

        $packageId = $request->package_type_id;
        $price = $request->package_type === 'membership'
            ? Membership::where('id', $packageId)->value('price')
            : TrainerPackage::where('id', $packageId)->value('price');

        $user = User::create($userCredentials);

        if($request->package_type === 'membership') {
            UserMembership::create([
                'customer_id' => $user->id,
                'membership_id' => $packageId,
                'status' => 'pending',
            ]);
        } else {
            UserTrainer::create([
                'customer_id' => $user->id,
                'trainer_id' => $request->trainer_id,
                'session_id' => $packageId,
                'status' => 'pending',
            ]);
        }

        PaymentLogs::create([
            'customer_id' => $user->id,
            'package_type' => $request->package_type,
            'package_type_id' => $packageId,
            'amount' => $price,
            'method' => $request->method,
            'status' => 'pending',
        ]);

        return response()->json([
            'status' => 201,
            'message' => 'User has been created',
            'user' => $user,
        ], 201);
    }

    public function adminApproveMembership($id){
        $userMembership = UserMembership::where('customer_id', $id)->first();

        if (!$userMembership) {
            return response()->json([
                'status' => 404,
                'message' => 'Membership not found.'
            ], 404);
        }
    
        $membership = Membership::findOrFail($userMembership->membership_id);
        
        $userMembership->status = 'active';
        $userMembership->start_date = Carbon::now();
        $userMembership->end_date = Carbon::now()->addDays($membership->duration_days);
        $userMembership->save();

        $paymentLogs = PaymentLogs::where('customer_id', $userMembership->customer_id)->latest()->first();
        $paymentLogs->status = 'paid';
        $paymentLogs->paid_at = Carbon::now();
        $paymentLogs->save();

        return response()->json([
            'status' => 200,
            'message' => 'Membership accepted',
            'userMembership' => $userMembership
        ]);
    }

    public function adminApprovePT($id){
        $userTrainer = UserTrainer::where('customer_id', $id)->first();

        if (!$userTrainer) {
            return response()->json([
                'status' => 404,
                'message' => 'PT Package not found.'
            ], 404);
        }
    
        $ptPackages = TrainerPackage::findOrFail($userTrainer->session_id);
        
        $userTrainer->status = 'active';
        $userTrainer->session_left = $ptPackages->session_count;
        $userTrainer->save();

        $paymentLogs = PaymentLogs::where('customer_id', $userTrainer->customer_id)->latest()->first();
        $paymentLogs->status = 'paid';
        $paymentLogs->paid_at = Carbon::now();
        $paymentLogs->save();

        return response()->json([
            'status' => 200,
            'message' => 'Membership accepted',
            '$userTrainer' => $userTrainer
        ]);
    }
}
