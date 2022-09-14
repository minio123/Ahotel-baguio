<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingSource extends Model
{
    use HasFactory;
    protected $fillable = ["source_name","created_by"];

}
