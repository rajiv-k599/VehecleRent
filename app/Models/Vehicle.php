<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $table="vehicles";
    protected $primaryKey = 'Vid';

    protected $fillable = [
        'Vid',
        'Vtype',
        'Brand',
        'Vname',
        'Model',
        'Vno',
        'Fuel',
        'Capacity',
        'Rate',
        'Overview',
        'img1',
        'img2',
        'img3',
    ];

}
