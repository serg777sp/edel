<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Auth;

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
    //Переопределенный метод postLogin
    public function postLogin(\Illuminate\Http\Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required_without:phone|email|max:255',
            'phone' => 'required_without:email|max:15',
            'password' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return redirect('/')
                        ->withErrors($validator)
                        ->withInput();
        }
        if(!empty($request->email)){
            //авторизируем по майлу
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect('/');
            }
        }
        if(!empty($request->phone)){
            //авторизируем по телефону
            if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])){
                return redirect('/');
            }
        }
        return redirect('/')->with('message','Не верный логин или пароль');
    }
    //Переопределенный метод postregister
//    public function postRegister(\Illuminate\Http\Request $request) {
//        var_dump($request->all()); die('dsadas');
//       // parent::postRegister($request);
//    }


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
            'name' => 'required|max:255',
            'email' => 'required_without:phone|email|max:255|unique:users',
            'phone' => 'required_without:email|max:12',
            'password' => 'required|min:6|confirmed',
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
