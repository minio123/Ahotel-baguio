<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ["room_type_id", "room_no", "no_of_beds", "room_description", "room_rate", "created_by"];
}
