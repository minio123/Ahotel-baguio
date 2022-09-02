<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use App\Models\UserLog;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('content.pages.permissions');
    }

    public function fetch_all_permission(){
      $result = Permission::where('is_active', 1)
                            ->orderBy('name')
                            ->get();

      return $result;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $current_user = Auth::id();

      $validated = $request->validate([
        'module_name' => 'required',
        'action_name' => 'required',
      ]);

      $insert = new Permission;

      $insert->module_name = $request->module_name;
      $insert->action_name = $request->action_name;
      $insert->created_by = $current_user;

      $result = $insert->save();

      if($result == true){

        $insert_logs = new UserLog;

        $insert_logs->user_id = $current_user;
        $insert_logs->module_name = "Permission";
        $insert_logs->action = "Add";
        $insert_logs->remarks = "Created ".$request->action_name." permission for ".$request->module_name." page";

        $insert_logs->save();

        return array(
          'status'  => 'success',
          'message' => 'Permission created successfully'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while creating permission. Please try again later.'
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
      $data = Permission::where('id', $id)
                    ->where('is_active',1)
                    ->first();
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
      $current_user = Auth::id();

      $validated = $request->validate([
        'module_name' => 'required',
        'action_name' => 'required',
      ]);

      $update = Permission::where('id', $id)
      ->where('is_active', 1)
      ->count();

      $update->module_name = $request->module_name;
      $update->action_name = $request->action_name;
      $update->created_by = $current_user;

      $result = $update->save();

      if($result == true){

        $insert_logs = new UserLog;

        $insert_logs->user_id = $current_user;
        $insert_logs->module_name = "Permission";
        $insert_logs->action = "Edit";
        $insert_logs->remarks = "Updated ".$request->action_name." permission for ".$request->module_name." page";

        $insert_logs->save();

        return array(
          'status'  => 'success',
          'message' => 'Permission updated successfully'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while updating permission. Please try again later.'
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
      $current_user = Auth::id();
      if($current_user == $id){
        return array(
          'status'  => 'error',
          'message' => 'Cannot delete your own user account.'
        );
      }
      $permission_data = Permission::find($id);

      $permission_data->is_active = 0;

      $result = $permission_data->save();

      if($result == true){

        $insert_logs = new UserLog;

        $insert_logs->user_id = $current_user;
        $insert_logs->module_name = "Permission";
        $insert_logs->action = "Delete";
        $insert_logs->remarks = "Deleted ".$permission_data->action_name." permission for ".$permission_data->module_name." page";

        $insert_logs->save();
        return array(
          'status'  => 'success',
          'message' => 'Permission deleted successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while deleting permission. Please try again later.'
        );
      }
    }
}
