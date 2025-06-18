<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMembership extends Model
{
    /** @use HasFactory<\Database\Factories\UserMembershipFactory> */
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'membership_id',
        'start_date',
        'end_date',
        'status',
    ];
}
