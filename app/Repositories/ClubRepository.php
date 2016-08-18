<?php
namespace App\Repositories;

use App\Models\Enroll;

class ClubRepository implements ClubRepositoryInterface
{

  public function __construct(){
  }

  public function addClub($std_id,$club_id){
    $enroll = new Enroll();
    $enroll->std_id = $std_id;
    $enroll->club_id = $club_id;
    $enroll->save();
    //return 'success';
  }

}
