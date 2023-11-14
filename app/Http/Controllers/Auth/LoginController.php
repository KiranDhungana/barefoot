<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\account;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    public function login(Request $req)
    {
        $input = $req->all();
        // $this->validate(
        //     $req,
        //     [
        //         'email' => 'required|email',
        //         'password' => 'required',
        //     ]
        // );
        $loginid = $input['email'];

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            if (auth()->user()->is_admin == 1) {
                $d = User::all();
                return redirect()->route('admin-home');
                // return view('admin', ['data' => $d]);
            } else if (auth()->user()) {
                return redirect()->route('home');
            }

        } else if (account::where('loginid', '=', $loginid)->first()) {
            $loginid = $input['email'];
            $password = $input['password'];

            $user = account::where('loginid', '=', $loginid)->first();

            if (!$user) {
                return response()->json(['success' => false, 'message' => 'Login Fail, please check email id']);
            }
            if (!Hash::check($password, $user->password)) {
                return response()->json(['success' => false, 'message' => 'Login Fail, pls check password']);
            }

            return view('viewaccount')->with('accountdata', $user);

        } else {

            return redirect()->route('login')->with('errormsg', 'Invalid credentials');
        }
    }
}