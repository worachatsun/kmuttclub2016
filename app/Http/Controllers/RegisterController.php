<?php

namespace App\Http\Controllers;

use Input;
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

  public function getRegister(){
    return $this->theme->scope('fb')->layout('blank')->render();
  }

  public function postRegister(){
    $data = Input::all();
    $this->RegisterRepository->fb_email_regis(array_get($data,'fb'),array_get($data,'email'));
    return $this->theme->scope('club')->layout('blank')->render();
  }



}
