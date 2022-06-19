<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    use HasFactory;

    protected $primaryKey = 'Rid';

    protected $fillable = [
        'Rid',
        'Vehicle_id',
        'rank',
       
    ];
}
