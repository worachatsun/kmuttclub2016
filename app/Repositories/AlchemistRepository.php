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

    public function noPhoneInsert($data){
      $student = new Student();
      $student->std_id = array_get($data,'std_id');
      $student->name = array_get($data,'name');
      $student->surname = array_get($data,'surname');
      $student->email = array_get($data,'email');
      $student->facebook = array_get($data,'fb');
      $student->faculty = array_get($data,'faculty');
      $student->email = array_get($data,'email');
      $student->secret_code = array_get($data,'std_secret_code');
      $student->save();
    }
}
