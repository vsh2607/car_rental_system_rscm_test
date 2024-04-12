<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        "rent_returndate",
        "rent_rentdate",
        "pelanggan_id",
        "car_id",
        "rent_total_price"
    ];


    public function customer(){
        return $this->belongsTo(Customer::class, "pelanggan_id", "id");
    }
    public function car(){
        return $this->belongsTo(Car::class, "car_id", "id");
    }
}
