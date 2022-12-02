<?php

namespace App\Http\Controllers;

use App\Models\HotelCharge;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HotelChargesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('content.pages.hotel-charges');
  }

  public function fetch_all(Request $request){
    if ($request->ajax()) {
      $result = HotelCharge::where('is_active', 1)
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

    $is_active = HotelCharge::where('charge_name', $request->charge_name)
                            ->where('is_active',1)
                            ->count();
    if($is_active == 0){
      $validated = $request->validate([
      'charge_name' => 'required',
      'charge_type' => 'required',
      ]);
    }else{
      $validated = $request->validate([
        'charge_name' => 'required|unique:hotel_charges',
        'charge_type' => 'required',
      ]);
    }

    $insert = new HotelCharge;

    $insert->charge_name = $request->charge_name;
    $insert->charge_type = $request->charge_type;
    $insert->created_by = $curr_user;

    $result = $insert->save();

    if($result == true){
    $user_log = new UserLog;

      $user_log->user_id = $curr_user;
      $user_log->module_name = "Hotel Charge Page";
      $user_log->action = "Add";
      $user_log->remarks = "Created ".$request->charge_name;

      $user_log->save();

      return array(
        'status'  => 'success',
        'message' => 'Hotel Charge created successfully.'
        );
    }else{
    return array(
      'status'  => 'error',
      'message' => 'We\'ve encountered an error while creating Hotel Charge. Please try again later.'
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
    $result = HotelCharge::find($id);

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

    $update = HotelCharge::find($id);

    $is_active = HotelCharge::where('charge_name', $request->charge_name)
                              ->where('is_active',1)
                              ->get();

    if(!empty($is_active[0]) === true && $is_active[0]->id == $id){
      $validated = $request->validate([
      'charge_name' => 'required',
      ]);
    }else{
      $validated = $request->validate([
        'charge_name' => 'required|unique:hotel_charges',
        'charge_type' => 'required',
      ]);
    }

    $update->charge_name = $request->charge_name;
    $update->charge_type = $request->charge_type;
    $update->updated_by = $curr_user;

    $result = $update->save();

    if($result == true){
      $user_log = new UserLog();

      $user_log->user_id = $curr_user;
      $user_log->module_name = "Hotel Charge Page";
      $user_log->action = "Edit";
      $user_log->remarks = "Updated ".$request->charge_name;

      $user_log->save();

      return array(
        'status'  => 'success',
        'message' => 'Hotel Charge updated successfully.'
      );
    }else{
      return array(
        'status'  => 'error',
        'message' => 'We\'ve encountered an error while updating Hotel Charge. Please try again later.'
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

    $update = HotelCharge::find($id);

    $update->is_active = 0;

    $result = $update->save();

    if($result == true){
      $user_log = new UserLog;

      $user_log->user_id = $curr_user;
      $user_log->module_name = "Hotel Charge Page";
      $user_log->action = "Delete";
      $user_log->remarks = "Deleted ".$update->charge_name;

      $user_log->save();

      return array(
        'status'  => 'success',
        'message' => 'Hotel Charge deleted successfully.'
      );
    }else{
      return array(
        'status'  => 'error',
        'message' => 'We\'ve encountered an error while deleting Hotel Charge. Please try again later.'
      );
    }

  }
}
