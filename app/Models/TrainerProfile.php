<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerProfile extends Model
{
    /** @use HasFactory<\Database\Factories\TrainerProfileFactory> */
    use HasFactory;

    protected $fillable = [
        'trainer_id',
        'bio',
        'specialization',
        'photo',
        'max_clients',
    ];
}
