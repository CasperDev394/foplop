<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/profile';

    public function __construct()
    {
        $this->middleware('guest')->except('login');
    }


    public function login(Request $request)
    {
        $user = User::where('email', $request->input('email'))->first();

        if($user){
            if ($this->verifyPassword($request->input('password'),$user->password)) {
                $authInfo = config('user.entities.'.$user->entity_type);
                Auth::shouldUse($authInfo['guard']);
                Auth::login($user);

//                dd(Auth::user());
                return redirect()->to($authInfo['basePath']);
            }
        }

        return back()
            ->withErrors([
                'email' => 'Логин пароль не подошли'
            ]);

    }


    protected function verifyPassword($password, $hash): bool{
        if(strlen($hash) === 32){
            return md5(md5($password)) === $hash;
        }
        if(strlen($hash) === 60){
            return password_verify($password,$hash);
        }
        return false;
    }

}
