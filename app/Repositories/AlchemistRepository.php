<?php
namespace App\Repositories;

use App\Models\Student;

class AlchemistRepository implements AlchemistRepositoryInterface{

    protected $student;

    public function __construct(){
      $this->student = new Student();
    }

    public function bindClubStudent($std_id,$club){
      $this->student->where('std_id',$std_id)->update(['club'=>$club]);
      return 'updated';
    }
}
