<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentLogs;
// use Illuminate\Routing\Controllers\HasMiddleware;
// use Illuminate\Routing\Controllers\Middleware;

class PaymentLogsController
{
    // public static function middleware(){
    //     return [
    //         new Middleware('auth:sanctum', except: ['uploadProof'])
    //     ];
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => 200,
            'message' => 'Getting all payment successful',
            'paymentLogs' => PaymentLogs::all()
        ], 200);  
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $currPaymentLogs = PaymentLogs::where('id', $id)->first();

        return response()->json([
            'status' => 200,
            'message' => 'Getting a payment successful',
            'paymentLog' => $currPaymentLogs
        ], 200);  
    }

    public function uploadProof(Request $request, $paymentId)
    {
        $request->validate([
            'proof_image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'notes' => 'string'
        ]);

        $payment = PaymentLogs::findOrFail($paymentId);

        $file = $request->file('proof_image');
        $filename = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('uploads/proofs'), $filename);

        $payment->proof_image = 'uploads/proofs/' . $filename;
        $payment->notes = $request->notes;
        $payment->save();

        return response()->json([
            'status' => 200,
            'message' => 'Proof of payment uploaded successfully.',
            'payment' => $payment
        ], 200); 
    }
}
