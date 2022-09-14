<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelCharge extends Model
{
    use HasFactory;

    protected $fillable = ["charge_name", "charge_type"];
}
