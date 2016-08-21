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
      $data = $this->club->select('club_id')->where('club_secret_code',$club)->first();
      $club_id = array_get($data,'club_id');
      $this->student->where('std_id',$std_id)->update(['role'=>$club_id]);
      return 'updated';
    }
}
