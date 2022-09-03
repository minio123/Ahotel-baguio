<?php

namespace App\Http\Controllers;

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
}
