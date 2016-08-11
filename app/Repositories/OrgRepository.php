<?php
namespace App\Repositories;

use App\Models\Club;
use DateTime;

class OrgRepository implements OrgRepositoryInterface
{

  protected $clubs;

  public function __construct(){
    $this->clubs = new Club();
  }

  public function getClubs(){
    return $this->clubs->get();
  }

}
