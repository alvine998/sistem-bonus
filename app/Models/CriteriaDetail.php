<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CriteriaDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'criteria_id',
        'criteria_name',
        'detail',
        'score'
    ];
}
