<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\UserLog;
use App\Models\User;
// use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated()
    {
      $current_user = Auth::id();

      $user = User::find($current_user);

      if($user->is_active == 0){
        Auth::logout();
        return redirect('login');
      }

      $insert_logs = new UserLog;

      $insert_logs->user_id = $current_user;
      $insert_logs->module_name = "Login";
      $insert_logs->action = "Login";
      $insert_logs->remarks = "User logged in";

      $insert_logs->save();
    }
}
