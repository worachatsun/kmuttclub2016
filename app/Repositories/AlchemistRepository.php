<?php
namespace App\Repositories;

use App\Models\Student;
use App\Models\Club;

class AlchemistRepository implements AlchemistRepositoryInterface{

    protected $student;
    protected $club;

    public function __construct(){
      $this->student = new Student();
      $this->club = new Club();
    }

    public function bindClubStudent($std_id,$club){
      $club_id = $this->club->select('club_id')->where('club_secret_code',$club)->first();
      $this->student->where('std_id',$std_id)->update(['role'=>$club]);
      return 'updated';
    }
}
