<?php

namespace App\Http\Controllers;

use Input;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Repositories\ClubRepositoryInterface;

class ClubController extends ACMBaseController
{

  protected $ClubRepository;

  public function __construct(ClubRepositoryInterface $ClubRepository){
      parent::__construct();
      $this->ClubRepository = $ClubRepository;
  }

  public function getAddclub(){
    return $this->theme->scope('club')->layout('blank')->render();
  }

  public function postAddclub(){
    $data = Input::all();
    $this->ClubRepository->addClub(1,array_get($data,'club_id'));
    return $this->theme->scope('club')->layout('blank')->render();
  }



}
