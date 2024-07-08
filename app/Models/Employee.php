<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'presence',
        'customer_complain',
        'vehicle_complain',
        'total_service',
        'team_complain',
        'total_bonus'
    ];
}
