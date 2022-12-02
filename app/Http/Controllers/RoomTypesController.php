<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\RoomType;
use App\Models\UserLog;

class RoomTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('content.pages.room-types');
    }

    public function fetch_all(Request $request){
      if ($request->ajax()) {
        $result = RoomType::where('is_active', 1)
                            ->get();

        // return $result;
        return datatables()->of($result)->toJson();

      }
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

      $is_active = RoomType::where('room_type_name', $request->room_type_name)
                            ->orWhere('room_type_acronym', $request->room_type_acronym)
                            ->where('is_active',1)
                            ->count();
      if($is_active == 0){
        $validated = $request->validate([
          'room_type_name' => 'required',
          'room_type_acronym' => 'required',
        ]);
      }else{
        $validated = $request->validate([
          'room_type_name' => 'required|unique:room_types',
          'room_type_acronym' => 'required|unique:room_types',
        ]);
      }

      $insert = new RoomType;

      $insert->room_type_name = $request->room_type_name;
      $insert->room_type_acronym = $request->room_type_acronym;
      $insert->created_by = $curr_user;

      $result = $insert->save();

      if($result == true){
        $user_log = new UserLog;

        $user_log->user_id = $curr_user;
        $user_log->module_name = "Room Tpye Page";
        $user_log->action = "Add";
        $user_log->remarks = "Created ".$request->room_type_name. "( ".$request->room_type_acronym." )";

        $user_log->save();

        return array(
          'status'  => 'success',
          'message' => 'Room Type created successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while creating room type. Please try again later.'
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
      $result = RoomType::find($id);

      return $result;
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

      $update = RoomType::find($id);

      $is_active = RoomType::where('room_type_name', $request->room_type_name)
      ->orWhere('room_type_acronym', $request->room_type_acronym)
      ->where('is_active',1)
      ->get();

      if(!empty($is_active[0]) === true && $is_active[0]->id == $id ){
        $validated = $request->validate([
          'room_type_name' => 'required',
          'room_type_acronym' => 'required',
        ]);

      }else{
        $validated = $request->validate([
          'room_type_name' => 'required|unique:room_types',
          'room_type_acronym' => 'required|unique:room_types',
        ]);
      }

      $update->room_type_name = $request->room_type_name;
      $update->room_type_acronym = $request->room_type_acronym;
      $update->updated_by = $curr_user;

      $result = $update->save();

      if($result == true){
        $user_log = new UserLog;

        $user_log->user_id = $curr_user;
        $user_log->module_name = "Room Tpye Page";
        $user_log->action = "Edit";
        $user_log->remarks = "Updated ".$request->room_type_name. "( ".$request->room_type_acronym." )";

        $user_log->save();

        return array(
          'status'  => 'success',
          'message' => 'Room Type updated successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while updating room type. Please try again later.'
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

      $update = RoomType::find($id);

      $update->is_active = 0;

      $result = $update->save();

      if($result == true){
        $user_log = new UserLog;

        $user_log->user_id = $curr_user;
        $user_log->module_name = "Room Tpye Page";
        $user_log->action = "Delete";
        $user_log->remarks = "Deleted room type ".$update->room_type_name. "( ".$update->room_type_acronym." )";

        $user_log->save();

        return array(
          'status'  => 'success',
          'message' => 'Room Type deleted successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while deleting room type. Please try again later.'
        );
      }

    }
}
