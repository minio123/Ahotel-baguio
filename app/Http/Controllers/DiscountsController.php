<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscountsController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('content.pages.discount');
  }

  public function fetch_all(Request $request){
    if ($request->ajax()) {
      $result = Discount::where('is_active', 1)
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
    $is_allow = 0;

    $is_active = Discount::where('discount_name', $request->discount_name)
                          ->where('is_active',1)
                          ->count();
    if($is_active == 0){
      $validated = $request->validate([
        'discount_name' => 'required',
      ]);
    }else{
      $validated = $request->validate([
      'discount_name' => 'required|unique:discounts',
      ]);
    }


    if($request->require_number){
      $is_allow = 1;
    }

    $insert = new Discount;

    $insert->discount_name = $request->discount_name;
    $insert->is_allow = $is_allow;
    $insert->created_by = $curr_user;

    $result = $insert->save();

    if($result == true){
      $user_log = new UserLog();

      $user_log->user_id = $curr_user;
      $user_log->module_name = "Discount Page";
      $user_log->action = "Add";
      $user_log->remarks = "Created ".$request->discount_name." discount";

      $user_log->save();

      return array(
        'status'  => 'success',
        'message' => 'Disocunt created successfully.'
      );
    }else{
      return array(
        'status'  => 'error',
        'message' => 'We\'ve encountered an error while creating Disocunt. Please try again later.'
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
    $result = Discount::find($id);

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
    $is_allow = 0;
    $update = Discount::find($id);

    $is_active = Discount::where('discount_name', $request->discount_name)
                          ->where('is_active',1)
                          ->get();

    if(!empty($is_active[0]) === true && $is_active[0]['id'] == $id){
      $validated = $request->validate([
        'discount_name' => 'required',
      ]);

    }else{
      $validated = $request->validate([
        'discount_name' => 'required|unique:discounts',
      ]);
    }

    if($request->require_number){
      $is_allow = 1;
    }

    $update->discount_name = $request->discount_name;
    $update->is_allow = $is_allow;
    $update->updated_by = $curr_user;

    $result = $update->save();

    if($result == true){
      $user_log = new UserLog;

      $user_log->user_id = $curr_user;
      $user_log->module_name = "Discount Page";
      $user_log->action = "Edit";
      $user_log->remarks = "Updated ".$request->discount_name." discount";

      $user_log->save();

      return array(
        'status'  => 'success',
        'message' => 'Disocunt updated successfully.'
      );
    }else{
      return array(
        'status'  => 'error',
        'message' => 'We\'ve encountered an error while updating Disocunt. Please try again later.'
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

    $update = Discount::find($id);

    $update->is_active = 0;

    $result = $update->save();

    if($result == true){
      $user_log = new UserLog;

      $user_log->user_id = $curr_user;
      $user_log->module_name = "Discount Page";
      $user_log->action = "Delete";
      $user_log->remarks = "Deleted ".$update->discount_name." discount";

      $user_log->save();

      return array(
        'status'  => 'success',
        'message' => 'Disocunt deleted successfully.'
      );
    }else{
      return array(
        'status'  => 'error',
        'message' => 'We\'ve encountered an error while deleting Disocunt. Please try again later.'
      );
    }

  }
}
