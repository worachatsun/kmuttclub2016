<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\RegisterRepositoryInterface;

class RegisterController extends ACMBaseController
{

  protected $RegisterRepository;

  public function __construct(RegisterRepositoryInterface $RegisterRepository){
      parent::__construct();
      $this->RegisterRepository = $RegisterRepository;
  }

  public function getIndex(){
    $user = $this->user;
    $stu = $this->RegisterRepository->checkClub(array_get($user,'username'));
    if (is_null($stu)||$stu==="") {
      return $this->theme->scope('fb',$user)->layout('blank')->render();
    }else{
      return redirect('/student/dashboard');
    }
  }

  public function postRegister(){
    $user = $this->user;
    $data = Input::all();
    $rules = array(
        'email' => 'required|email'
    );
    $messages = array(
        'email.required'  => 'Email field is required.'
    );

    $validator = Validator::make($data,$rules,$messages);

    if ($validator->fails()) {
        $messages = $validator->messages();
        return redirect('main')->withErrors($validator)->withInput();
    } else {
        $redi = $this->RegisterRepository->fb_email_regis($data,$user);
        return redirect('student/dashboard');
    }
  }



}
