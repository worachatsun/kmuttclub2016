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

    public function getBindclub(){
      return $this->theme->scope('alchemist')->render();
    }

    public function postBindclub(){
      $data = Input::all();
      $student = array_get($data,'student');
      $club = array_get($data,'club');
      $this->AlchemistRepository->bindClubStudent($student,$club);
      return redirect('alchemist');
    }
}
