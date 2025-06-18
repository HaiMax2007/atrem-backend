<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTrainer extends Model
{
    /** @use HasFactory<\Database\Factories\UserTrainerFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'trainer_id',
        'session_id',
        'start_date',
        'end_date',
        'end_date',
        'session_left',
        'status',
    ];
}
