<?php

namespace App\Http\Controllers;

use App\Models\BookingSource;
use App\Models\UserLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return view('content.pages.booking-source');
    }

    public function fetch_all(Request $request){
      if ($request->ajax()) {
        $result = BookingSource::where('is_active', 1)
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

      $is_active = BookingSource::where('source_name', $request->source_name)
                                ->where('is_active',1)
                                ->count();
      if($is_active == 0){
        $validated = $request->validate([
          'source_name' => 'required',
        ]);
      }else{
        $validated = $request->validate([
          'source_name' => 'required|unique:booking_sources',
        ]);
      }

      $insert = new BookingSource;

      $insert->source_name = $request->source_name;
      $insert->created_by = $curr_user;

      $result = $insert->save();

      if($result == true){
        $user_log = new UserLog;

        $user_log->user_id = $curr_user;
        $user_log->module_name = "Booking Source Page";
        $user_log->action = "Add";
        $user_log->remarks = "Created ".$request->source_name;

        $user_log->save();

        return array(
          'status'  => 'success',
          'message' => 'Booking Source created successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while creating booking source. Please try again later.'
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
      $result = BookingSource::find($id);

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

      $update = BookingSource::find($id);

      $is_active = BookingSource::where('source_name', $request->source_name)
                                ->where('is_active',1)
                                ->count();

      if($is_active == 0 ){
        $validated = $request->validate([
          'source_name' => 'required',
        ]);
      }else{
        $validated = $request->validate([
          'source_name' => 'required|unique:booking_sources',
        ]);
      }

      $update->source_name = $request->source_name;
      $update->updated_by = $curr_user;

      $result = $update->save();

      if($result == true){
        $user_log = new UserLog;

        $user_log->user_id = $curr_user;
        $user_log->module_name = "Booking Source Page";
        $user_log->action = "Edit";
        $user_log->remarks = "Updated ".$request->source_name;

        $user_log->save();

        return array(
          'status'  => 'success',
          'message' => 'Booking Source updated successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while updating booking source. Please try again later.'
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

      $update = BookingSource::find($id);

      $update->is_active = 0;

      $result = $update->save();

      if($result == true){
        $user_log = new UserLog;

        $user_log->user_id = $curr_user;
        $user_log->module_name = "Booking Source Page";
        $user_log->action = "Delete";
        $user_log->remarks = "Deleted ".$update->source_name;

        $user_log->save();

        return array(
          'status'  => 'success',
          'message' => 'Booking Source deleted successfully.'
        );
      }else{
        return array(
          'status'  => 'error',
          'message' => 'We\'ve encountered an error while deleting booking source. Please try again later.'
        );
      }

    }
}
