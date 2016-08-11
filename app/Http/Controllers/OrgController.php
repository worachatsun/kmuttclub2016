<?php

namespace App\Http\Controllers;

use Theme;
use Input;

use App\Repositories\OrgRepositoryInterface;
use DateTime;

class OrgController extends ACMBaseController
{

  protected $OrgRepository;
  
  public function __construct(OrgRepositoryInterface $OrgRepository){
    parent::__construct();
    $this->OrgRepository = $OrgRepository;
  }

  public function getIndex(){
    
    $clubs = $this->OrgRepository->getClubs();

    $content = array(
      'clubs' => $clubs
    );

    return $this->theme->scope('organization.index',$content)->render();
  }

  public function getDashboard(){
    return $this->theme->scope('organization.index')->render();
  }

}