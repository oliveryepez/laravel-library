<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = 'dashboard';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:45',
            'last_name' => 'required|max:45',
            'username' => 'required|max:45',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    public function login(Request $request){

        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt(['email' => $email, 'password' => $password])){

            return redirect()->intended($this->redirectTo);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => trim(strtolower($data['first_name'])),
            'last_name'  => trim(strtolower($data['last_name'])),
            'username'   => trim(strtolower($data['username'])),
            'email'      => trim(strtolower($data['email'])),
            'password'   => bcrypt($data['password']),
            'active'     => true,
        ]);
    }
}
