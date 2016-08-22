<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Carbon\Carbon;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'name' => 'required|max:255|regex:/^[a-z]+$/i',
            'apellido' => 'required|max:255|regex:/^[a-z]+$/i',
            'fecha_nac' => 'required',
            'telefono' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|max:15|confirmed',
        ],
        [

            'name.required' => 'El campo nombre es requerido',
            'apellido.required' => 'El campo nombre es requerido',
            'name.regex' => 'Sólo se aceptan letras',
            'apellido.regex' => 'Sólo se aceptan letras',
            'password.min' => 'Minimo 8 caracteres',
            'password.max' => 'Máximo 15 carateres',
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $dateF = strtotime($data['fecha_nac']);
        $dateF = date('Y-m-d',$dateF);
        return User::create([
            'name' => $data['name'],
            'apellido' => $data['apellido'],
            'fecha_nac' => $dateF,
            'telefono' => $data['telefono'],
            'email' => $data['email'],
            'password   ' => bcrypt($data['password']),
        ]);
    }
}
