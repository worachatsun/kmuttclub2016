<?php
namespace App\Http\Controllers\Auth;

use App\User;
use Input;
use Auth;
use Adldap;
use Validator;
use Session;
use App\Models\Student;
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

        $error = "";

        if (Input::has('username')) {

            $username = Input::get('username');
            $password = Input::get('password');


            if (!Adldap::getDefaultProvider()->search()->where('uid', '=', $username)->first()) {
              $error['username']='กรุณากรอกรหัสนักศึกษาให้ถูกต้อง';
              if (!Input::has('password')) {
                  $error['password']='กรุณากรอกรหัสผ่าน';
              }
              return redirect('auth/login')->withErrors($error)->withInput();
            }

            if (!Input::has('password')) {
                $error['password']='กรุณากรอกรหัสผ่าน';
                return redirect('auth/login')->withErrors($error)->withInput();
            }

            $user = User::where('username',$username)->first();
            if (isset($user)) {
              if (Adldap::getDefaultProvider()->auth()->attempt($username,$password)){
                Auth::Login($user);
                return redirect('/main');
              }
            }else{
                if (Adldap::getDefaultProvider()->auth()->attempt($username,$password)) {
                    $user = Adldap::getDefaultProvider()->search()->where('uid', '=', $username)->first();
                    if ($user) {
                        $name = array_get($user, 'attributes.displayname.0').' '.array_get($user, 'attributes.givenname.0');
                        $mail = array_get($user, 'attributes.mail.0');
                        $faculty = explode("/", array_get($user, 'attributes.homedirectory.0') );
                        
                        $student = new Student();
                        $student->std_id = $username;
                        $student->name = array_get($user, 'attributes.displayname.0');
                        $student->surname = array_get($user, 'attributes.givenname.0');
                        $student->faculty = array_get($faculty, '2');
                        $student->save();

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
            if (!Input::has('username')) {
              $error['username']='กรุณากรอกรหัสนักศึกษา';
            }
            if (!Input::has('password')&&!Input::has('username')) {
                $error['username']='กรุณากรอกรหัสนักศึกษา';
                $error['password']='กรุณากรอกรหัสผ่าน';
                return redirect('auth/login')->withErrors($error);
            }

        }
        if (Input::has('password')) {
                $error['password']='กรุณากรอกรหัสผ่านให้ถูกต้อง';
        }
        $theme = \Theme::uses('alchemist')->layout('default');
        return redirect('auth/login')->withErrors($error)->withInput();

    }

}
