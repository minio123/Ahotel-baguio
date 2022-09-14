<?php

namespace App\Http\Controllers;

use App\Models\BookingSource;
use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class Select2Controller extends Controller
{
  public function rooms(){
    $result = Room::where('is_active',1)
                  ->get();

    return $result;
  }

  public function room_type(){
    $result = RoomType::where('is_active',1)
                  ->get();

    return $result;
  }

  public function guest(){
    $result = array();

    $result['room_lists'] = Room::where('is_active', 1)
                                ->get();

    $result['booking_source'] = BookingSource::where('is_active', 1)
                                              ->get();

    return $result;

  }
}
