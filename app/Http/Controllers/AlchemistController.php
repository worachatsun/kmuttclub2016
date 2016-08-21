<?php

namespace App\Http\Controllers;

use Input;
use App\Repositories\AlchemistRepositoryInterface;

class AlchemistController extends ACMBaseController{
    protected $AlchemistRepository;

    public function __construct(AlchemistRepositoryInterface $AlchemistRepository){
      parent::__construct();
      $this->AlchemistRepository = $AlchemistRepository;
    }

    public function getIndex(){
      return redirect('alchemist/bindclub');
    }

    public function getNophone(){
      return $this->theme->scope('nophone')->layout('org')->render();
    }

    public function postNophone(){
      $data = Input::get();
      $this->AlchemistRepository->noPhoneInsert($data);
      return redirect('alchemist/nophone');
    }

    public function getBindclub(){
      return $this->theme->scope('alchemist')->layout('org')->render();
    }

    public function postBindclub(){
      $data = Input::all();
      $student = array_get($data,'student');
      $club = array_get($data,'club');
      $this->AlchemistRepository->bindClubStudent($student,$club);
      return redirect('alchemist');
    }
}
