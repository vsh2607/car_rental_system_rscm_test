<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Car extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'car_merk',
        'car_model',
        'car_plate_number',
        'car_rental_price',
    ];

}
