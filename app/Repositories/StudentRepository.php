<?php
namespace App\Repositories;

use App\Models\Student;
use App\Models\Enroll;
use App\Models\Club;

class StudentRepository implements StudentRepositoryInterface {

    protected $clubs;
    protected $studentAccounts;
    protected $registrations;

    public function __construct(){
        $this->studentAccounts = new Student();
        $this->clubs = new Club();
        $this->registrations = new Enroll();
    }

    public function getAllClubs($std_id)
    {
        $clubs = $this->registrations
        ->join('clubs','clubs.club_id','=','enrolls.club_id')
        ->where('std_id',$std_id)
        ->get();

        $data = json_decode($clubs,true);
        return $data;
    }






}
