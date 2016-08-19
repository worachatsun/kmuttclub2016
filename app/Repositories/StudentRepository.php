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
        $enrolls = $this->registrations
        ->join('clubs','enrolls.club_id','=','clubs.club_id')
        ->where('std_id',$std_id)
        ->get();

        $data = json_decode($enrolls,true);
        return $data;
    }

    public function deleteMyClub($std_id,$club_id){
        $enroll = $this->registrations
        ->where('std_id',$std_id)
        ->where('club_id',$club_id)
        ->delete();
    }

}
