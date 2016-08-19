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
        $clubsInfos = $this->registrations

        ->where('std_id',$std_id)
        ->get();

        // dd($clubsInfos);

        $clubs_ids = collect();
        $clubCount = 0;
        foreach($clubsInfos as $clubsInfo){
            $clubCount++;
            $clubs_ids->put('clubId'.$clubCount, $clubsInfo['attributes']['club_id']);
        }

        $clubs = collect();
        $clubCount = 0;
        foreach ($clubs_ids as $club_id => $id) {
            $clubCount++;
            $clubInf = $this->clubs->where('club_secret_code',$id)->get();
            $clubs->put('club'.$clubCount, $clubInf['0']['attributes']);
        }

        $data = json_decode($clubs,true);
        return $data;
    }

}
