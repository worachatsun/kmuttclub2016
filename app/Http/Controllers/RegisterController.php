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
    $data = $this->user;
    return $this->theme->scope('fb',$data)->layout('blank')->render();
  }

  public function postRegister(){
    $user = $this->user;
    $data = Input::all();
    $rules = array(
        'email' => 'required'
    );
    $messages = array(
        'email.required'  => 'Email field is required.'
    );


    $validator = Validator::make($data,$rules,$messages);

    if ($validator->fails()) {
        $messages = $validator->messages();
        return redirect('main')->withErrors($validator);
    } else {
        $redi = $this->RegisterRepository->fb_email_regis($data,$user);
        return redirect('student/dashboard');
    }
  }



}
