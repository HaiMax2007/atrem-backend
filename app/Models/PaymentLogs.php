<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLogs extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentLogsFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'package_type_id',
        'package_id',
        'amount',
        'method',
        'status',
        'paid_at',
        'notes',
        'proof_image',
    ];
}
