<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\UserLog;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //$id = Auth::id();
      return view('content.pages.users');
    }
    //FETCH

    public function fetch_all_user(Request $request){

      if ($request->ajax()) {
        $result = User::where('is_active', 1)
                    ->orderBy('name')
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $created_by = Auth::id();

      $user_data =User::where('email', $request->email)
                        ->where('is_active', 1)
                        ->count();

      if($user_data == 0){
        $validated = $request->validate([
          'full_name' => 'required',
          'email' => 'required|email',
          'user_level' => 'required',
        ]);
      }else{
        $validated = $request->validate([
          'full_name' => 'required',
          'email' => 'required|unique:users|email',
          'user_level' => 'required',
        ]);
      }

      $insert = new User;

      $insert->name = $request->full_name;
      $insert->user_level = $request->user_level;
      $insert->email = $request->email;
      $insert->password = Hash::make('123');
      $insert->created_by = $created_by;

      $result = $insert->save();

      if($result == true){

        $insert_logs = new UserLog;

        $insert_logs->user_id = $created_by;
        $insert_logs->module_name = "User Lists";
        $insert_logs->action = "Add";
        $insert_logs->remarks = "Created user account for ".$request->full_name;

        $insert_logs->save();

        return array(
          'status'  => 'success',
          'message' => 'User created successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while creating user. Please try again later.'
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
      $data = User::where('id', $id)
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
      $data = User::where('is_active', 1)
                    ->orderBy('name')
                    ->get();
      return $data;
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
      $update_by = Auth::id();

      $user_count =User::where('email', $request->email)
                        ->where('is_active', 1)
                        ->get();

      if(!empty($user_count[0]) == true){
        $validated = $request->validate([
          'full_name' => 'required',
          'email' => 'required|unique:users|email',
          'user_level' => 'required',
        ]);

      }else{
        $validated = $request->validate([
          'full_name' => 'required',
          'email' => 'required|email',
          'user_level' => 'required',
        ]);
      }

      $result = '';
      $user_data = User::find($id);

      $user_data->name = $request->full_name;
      $user_data->user_level = $request->user_level;
      $user_data->email = $request->email;
      $user_data->updated_by = $update_by;

      $result = $user_data->save();

      if($result == true){

        $insert_logs = new UserLog;

        $insert_logs->user_id = $update_by;
        $insert_logs->module_name = "User Lists";
        $insert_logs->action = "Edit";
        $insert_logs->remarks = "Updated the user details of ".$request->full_name;

        $insert_logs->save();

        return array(
          'status'  => 'success',
          'message' => 'User updated successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while updating User. Please try again later.'
        );
      }
    }

    public function update_password(Request $request, $id){

      $update_by = Auth::id();

      $validated = $request->validate([
      'password' => 'required|min:8',
      'confirm_password' => 'required|same:password|min:8'
      ]);

      $user_data = User::find($id);

      $user_data->password = Hash::make($request->confirm_password);

      $result = $user_data->save();

      if($result == true){

        $insert_logs = new UserLog;

        $insert_logs->user_id = $update_by;
        $insert_logs->module_name = "User Lists";
        $insert_logs->action = "Change Password";
        $insert_logs->remarks = "Change Password for ".$user_data->name;

        $insert_logs->save();

        return array(
          'status'  => 'success',
          'message' => 'Password updated successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while updating password. Please try again later.'
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
      $user_data = User::find($id);

      $user_data->is_active = 0;
      $user_data->disabled_by = $current_user;

      $result = $user_data->save();

      if($result == true){

        $insert_logs = new UserLog;

        $insert_logs->user_id = $current_user;
        $insert_logs->module_name = "User Lists";
        $insert_logs->action = "Delete";
        $insert_logs->remarks = "Deleted the user account of ".$user_data->name;

        $insert_logs->save();
        return array(
          'status'  => 'success',
          'message' => 'User deleted successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while deleting User. Please try again later.'
        );
      }

    }

    //FOR USER LOGOUT
    public function logout(){
      $current_user = Auth::id();
      $insert_logs = new UserLog;

      $insert_logs->user_id = $current_user;
      $insert_logs->module_name = "Logout";
      $insert_logs->action = "Logout";
      $insert_logs->remarks = "User logged out";

      $insert_logs->save();

      Session::flush();
      Auth::logout();
      return redirect('login');
    }
}
