<?php

namespace App\Http\Controllers;

use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Session;
use Input;

class StudentController extends ACMBaseController
{

    protected $ClubRepository;
    protected $club_secret_code;
    protected $std_id;

    public function __construct(StudentRepositoryInterface $StudentRepository){
        parent::__construct();
        $this->StudentRepository = $StudentRepository;
    }


    public function getIndex(){
        return redirect('student/dashboard');
    }

    public function getDashboard(){

        $std_id = array_get($this->user,'username');
        $clubs = $this->StudentRepository->getAllClubs($std_id);
        $role = $this->StudentRepository->getRole($std_id);
        Session::put('club_secret',$this->StudentRepository->getClubFromRole($role));
        $content = array(
            'clubs' => $clubs,
            'role' => $role['role']
        );
        return $this->theme->layout('std')->scope('student.dashboard',$content)->render();
    }

    public function postDeletingclub(){
        $data = Input::all();
        $club_id = array_get($data,'club_id');
        $std_id = array_get($this->user,'username');
        $this->StudentRepository->deleteMyClub($std_id,$club_id);
        return redirect('student/dashboard');
    }
}
