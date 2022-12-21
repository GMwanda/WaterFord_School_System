<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated() {
        if(Auth::check()){
            if(Auth::user()->is_admin == 2){
                return redirect('/Staff');
            } else if(Auth::user()->is_admin == 1){
                return redirect('/admin');
            } else {
                return redirect('/st');
            }
        }
   }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // // LOGIN CREDENTIALS CHECK
    // public function login(Request $request)
    // {
    //     $input = $request->all();
    //     // GETS THE 
    //     $this->validate($request,[
    //         'email' => 'required|email',
    //         'password' => 'required'
    //     ]);
    //     if (auth()->attempt(array('email' => $input['email']), array('password' => $input['password']))) {
    //         if (auth()->user()->is_admin == 1) {
    //             return redirect()->route('adminHome');
    //         } else {
    //             return redirect()->route('stdhome');
    //         }
    //     } else {
    //         return redirect()->route('LoginPortal')->with('error', 'Input is incorrect.');
    //     }
    // }
}
