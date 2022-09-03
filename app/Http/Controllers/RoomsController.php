<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Models\UserLog;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\DB;
class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('content.pages.rooms');
    }

    public function fetch_all(){
      $data = Room::join('room_types', 'rooms.room_type_id','=', 'room_types.id')
                    ->where('rooms.is_active', 1)
                    ->get("*");

      // $data = DB::table('rooms')
      //           ->join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
      //           ->paginate(5);

      return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $curr_user = Auth::id();
      $request->room_rate = str_replace(',','',$request->room_rate);
      $is_active = Room::where('room_no', $request->room_no)
                        ->where('is_active', 1)
                        ->count();

      if($is_active > 0){
        $validated = $request->validate([
          'room_no' => 'required|unique:rooms',
          'room_type_id' => 'required',
          'no_of_beds'  => 'required|numeric|min:1|not_in:0',
          'room_rate'   => 'required'
        ]);
      }else{
        $validated = $request->validate([
          'room_no' => 'required',
          'room_type_id' => 'required',
          'no_of_beds'  => 'required|numeric|min:1|not_in:0',
          'room_rate'   => 'required'
        ]);
      }

      $insert = new Room;

      $insert->room_no = $request->room_no;
      $insert->room_type_id = $request->room_type_id;
      $insert->no_of_beds = $request->no_of_beds;
      $insert->room_rate = $request->room_rate ;
      $insert->room_description = $request->room_description;
      $insert->created_by = $request->$curr_user;

      $result = $insert->save();

      if($result == true){
        $insert_logs = new UserLog;

        $insert_logs->user_id = $curr_user;
        $insert_logs->module_name = "Room Lists Page";
        $insert_logs->action ="Add";
        $insert_logs->remarks = "Created room number ".$request->room_no;

        $insert_logs->save();

        return array(
          'status'  => 'success',
          'message' => 'Room created successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while creating room. Please try again later.'
        );
      }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $data = Room::find($id);

      return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $curr_user = Auth::id();

      $request->room_rate = str_replace(',','',$request->room_rate);

      $room_count = Room::where('room_no', $request->room_no)
                          ->where('is_active',1)
                          ->count();

      if($room_count > 0){
        $validated = $request->validate([
          'room_no' => 'required|unique:rooms'
        ]);
      }else{
        $validated = $request->validate([
          'room_no' => 'required',
          'room_type_id' => 'required',
          'no_of_beds'  => 'required|numeric|min:1|not_in:0',
          'room_rate'   => 'required'
        ]);
      }

      $update = Room::find($id);

      $update->room_no = $request->room_no;
      $update->room_type_id = $request->room_type_id;
      $update->no_of_beds = $request->no_of_beds;
      $update->rooom_rate = str_replace(',','',$request->rooom_rate);
      $update->room_description = $request->room_description;
      $update->updated_by = $curr_user;

      $result = $update->save();

      if($result == true){
        $insert_logs = new UserLog;

        $insert_logs->user_id = $curr_user;
        $insert_logs->module_name = "Room Lists Page";
        $insert_logs->action = "Edit";
        $insert_logs->remarks = "Updated Room ".$request->room_no." data.";

        $insert_logs->save();

        return array(
          'status'  => 'succes',
          'message' => 'Room updated successfully'
        );

      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while updating room. Please try again later'
        );
      }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $curr_user = Auth::id();

      $delete = Room::find($id);

      $delete->room_no = 0;

      $result = $delete->save();

      if($result == true){
        $insert_logs = new UserLog;

        $insert_logs->user_id = $curr_user;
        $insert_logs->module_name = "Room Lists Page";
        $insert_logs->action = "Delete";
        $insert_logs->remarks = "Deleted Room ".$delete->room_no." data.";

        $insert_logs->save();

        return array(
          'status'  => 'succes',
          'message' => 'Room deleted successfully'
        );

      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while deleting room. Please try again later'
        );
      }

    }
}
