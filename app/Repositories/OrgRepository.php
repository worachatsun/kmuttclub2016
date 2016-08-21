<?php
namespace App\Repositories;

use App\Models\Student;
use App\Models\Enroll;
use App\Models\Club;

class OrgRepository implements OrgRepositoryInterface{

    protected $clubs;
    protected $studentAccounts;
    protected $registrations;

    public function __construct(){
        $this->studentAccounts = new Student();
        $this->clubs = new Club();
        $this->registrations = new Enroll();
    }

    public function getAllClubs(){
        $clubsInf = $this->clubs->all();
        $result = array();
        foreach($clubsInf as $club){
            // brust force !
            array_add($club, 'amount_member', $this->getClubMembersAmount($club['club_id']));
        }
        return $clubsInf;
    }

    public function getClubMembers($id){
        $members = $this->registrations
                    ->join('students','enrolls.std_id','=','students.std_id')
                    ->where('club_id',$id)->get();
        return $members;
    }

    public function getInformation($id){
        $stdInfos = $this->studentAccounts->find($id);
        return $stdInfos;
    }

    public function getClubMembersAmount($id){
        $members = $this->getClubMembers($id);
        return $members->count();
    }

    public function getRegistryInfos($id){
        $clubsIds = $this->registrations->select('club_id')->where('std_id', $id)->get();
        $clubInfos = collect();
        $clubInfos->put('meetCondition',false);
        $count =0;
        foreach ($clubsIds as $clubsId) {
            $count++;
            $clubInfos->put('name'.$count,$this->clubs->select('club_name')->where('club_id',$clubsId->club_id)->get());
        }
        if($count >= 2){
            $clubInfos->put('meetCondition',true);
        }

        return $clubInfos;
    }

    // Club

    public function getClubInfo($id){
        $club = $this->clubs->where('club_id',$id)->get()->first();
        return $club;
    }

    public function checkRole($std_id){
      $role = $this->studentAccounts->select('role')->where('std_id',$std_id)->first();
      return array_get($role,'role');
    }

    public function getClubSecretCode($club_id){
      $club_secret_code = $this->clubs->select('club_secret_code')->where('club_id',$club_id)->first();
      return array_get($club_secret_code,'club_secret_code');
    }

}
