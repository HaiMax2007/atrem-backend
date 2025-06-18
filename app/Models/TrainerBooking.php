<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerBooking extends Model
{
    /** @use HasFactory<\Database\Factories\TrainerBookingFactory> */
    use HasFactory;

    protected $fillable = [
        'user_trainer_id',
        'session_date',
        'start_time',
        'end_time',
        'status',
        'notes',
    ];
}
