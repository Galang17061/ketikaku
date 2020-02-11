<?php

namespace App\Http\Controllers\Auth;

use App\d_mem;
use App\Http\Controllers\Controller;
use Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'm_username' => ['required', 'string', 'max:255','unique:d_mem'],
            'm_email'    => ['required', 'string', 'email', 'max:255', 'unique:d_mem'],
            // 'm_password'   => ['required', 'string', 'min:6', 'confirmed','same:password_confirmation'],
            // 'password_confirmation' =>['required', 'string', 'min:6'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $token = str_random(300);
        // return $token;
        // dd($token);
        $getdt = DB::table('d_mem')->max('m_id');
        $incre = ($getdt == 0 ? 1 : $getdt+1);
        // dd($data['email']);
        $username = $data['m_username'];
        $code = "KTK-".date('ymd')."-".$incre;
        

        return $user = d_mem::create([
            'm_code'     => $code,
            'm_email'    => $data['m_email'],
            'm_username' => $data['m_username'],
            'm_token'    => $token,
            'm_password' => sha1(md5('لا إله إلاّ الله') . $data['m_password']),
            'm_isactive' =>'N',
            'm_role'=>5
        ]);

        // return view('home');

    }
}
