<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainerPackage extends Model
{
    /** @use HasFactory<\Database\Factories\TrainerPackageFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'session_count',
    ];
}
