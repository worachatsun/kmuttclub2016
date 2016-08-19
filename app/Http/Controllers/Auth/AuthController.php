<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Input;
use Auth;
use Adldap;
use Validator;
use App\Models\ 
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{

    public function getLogout()
    {
        Auth::logout();
        return redirect('auth/login');
    }

    public function getLogin(){
        $theme = \Theme::uses('alchemist')->layout('default');
        return $theme->layout('login')->scope("auth.login")->render();
    }

    public function postLogin(){

        $error;
        if (Input::has('username')) {

            $username = Input::get('username');
            $password = Input::get('password');
            $user = User::where('username',$username)->first();
            if (isset($user)) {

                Auth::Login($user);

                if ($username == "alchemist") {
                    return redirect('/view');
                }
                return redirect('/student/dashboard');
            }else{
                if (Adldap::getDefaultProvider()->auth()->attempt($username,$password)) {
                    $user = Adldap::getDefaultProvider()->search()->where('uid', '=', $username)->first();
                    if ($user) {
                        $name = array_get($user, 'attributes.displayname.0').' '.array_get($user, 'attributes.givenname.0');
                        $mail = array_get($user, 'attributes.mail.0');
                        $faculty = explode("/", array_get($user, 'attributes.homedirectory.0') );
                        $user = User::create([
                            'username'  =>  $username,
                            'name'      =>  $name,
                            'email'     =>  $mail,
                            'faculty'   =>  array_get($faculty, '2'),
                        ]);
                        Auth::Login($user);
                        return redirect('/main');
                    }
                }else{
                    $error['username']='รหัสนักศึกษาผิด';
                }
            }
        }else{
            if (Input::has('username')) {
                $error['username']='กรุณากรอกรหัสนักศึกษา';
            }

        }
        if (Input::has('password')) {
                $error['password']='กรุณากรอกรหัสผ่าน';
            }
        $theme = \Theme::uses('alchemist')->layout('default');
        return $theme->layout('login')->scope("auth.login")->render();

    }

}
