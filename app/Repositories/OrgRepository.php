<?php
namespace App\Repositories;

use App\Models\Student;
use App\Models\Regis;
use App\Models\Club;

class OrgRepository implements OrgRepositoryInterface{
    
    protected $clubs;
    protected $studentAccounts;
    protected $registrations;

    public function __construct(){
        $this->studentAccounts = new Student();
        $this->clubs = new Club();
        $this->registrations = new Regis();
    }

    public function getAllClubs(){
        $clubsInf = $this->clubs->all();
        return $clubsInf;
    }

    public function getMembers($id){
        $members = $this->registrations->where('club_id',$id)->get();
        return $members;
    }

    public function getInformation($id){
        $stdInfos = $this->studentAccounts->find($id);
        return $stdInfos;
    }

    public function getMembersAmount($id){
        $members = $this->getMembers($id);
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

}