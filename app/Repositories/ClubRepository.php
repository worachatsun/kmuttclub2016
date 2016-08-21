<?php
namespace App\Repositories;

use App\Models\Student;
use App\Models\Enroll;
use App\Models\Club;

class ClubRepository implements ClubRepositoryInterface {

    protected $clubs;
    protected $studentAccounts;
    protected $registrations;

    public function __construct(){
        $this->studentAccounts = new Student();
        $this->clubs = new Club();
        $this->registrations = new Enroll();
    }


    public function addClub($std_id,$club_id){
        $enroll = new Enroll();
        $enroll->std_id = $std_id;
        $enroll->club_id = $club_id;
        $enroll->save();
        //return 'success';
    }

    public function getClubInfo($club_id)
    {
        $club = $this->clubs->where('club_secret_code',$club_id)->first();
        return $club;
    }

    public function getMemberAmount($club_id)
    {
        $members = $this->registrations->where('club_id',$club_id)->get();
        return $members->count();
    }

    public function getAllMembers($club_id)
    {
        $members = $this->registrations
        ->join('students','enrolls.std_id','=','students.std_id')
        ->select('students.std_id','students.name','students.surname','students.faculty','students.facebook','students.email')
        ->where('club_id',$club_id)
        ->orderBy('faculty','asc')
        ->get();

        $data = json_decode($members,true);
        return $data;
    }

    public function studentEnroll($secret_code,$club_secret_code)
    {
        $std_id = $this->_getStudentId($secret_code);
        $club_id = $this->_getClubId($club_secret_code);
        $this->registrations->insert(['std_id'=>$std_id , 'club_id'=>$club_id]);

    }



    private function _getStudentId($secret_code)
    {
        $std_id = $this->studentAccounts->where('secret_code',$secret_code)->first();
        //$data = json_decode($std_id, true);
        print_r($std_id['std_id']);
        //return array_get($data,'std_id');
        return $std_id->std_id;
    }

    private function _getClubId($club_secret_code)
    {
        $club_id = $this->clubs->select('club_id')->where('club_secret_code',$club_secret_code)->get();
        $data = json_decode($club_id,true);
        return array_get($data,'0.club_id');
    }

    public function getClubNumber($club_id){
      $club = $this->clubs->select('club_id')->where('club_secret_code',$club_id)->get();
      $data = json_decode($club,true);
      return $data;
    }

    public function checkClub($club_secret_code){
      $club = $this->clubs->where('club_secret_code',$club_secret_code)->first();
      return $club;
    }

    public function checkDuplicateClub($std_id,$club_secret_code){
      $club_id = $this->clubs->select('club_id')->where('club_secret_code',$club_secret_code)->first();
      $club = $this->registrations->where('std_id',$std_id)->where('club_id',array_get($club_id,'club_id'))->first();
      return $club;
    }



}
