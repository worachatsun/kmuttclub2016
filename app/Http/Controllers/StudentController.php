<?php

namespace App\Http\Controllers;

use App\Repositories\StudentRepositoryInterface;
use Illuminate\Http\Request;
use Input;

class StudentController extends ACMBaseController
{

    protected $ClubRepository;
    protected $club_secret_code;
    protected $std_id;

    public function __construct(StudentRepositoryInterface $StudentRepository){
        parent::__construct();
        $this->StudentRepository = $StudentRepository;
        $this->std_id = '58130500013';
    }


    public function getIndex(){
        return $this->theme->scope('student.index')->render();
    }

    public function getDashboard(){
        $std_id = $this->std_id;
        $clubs = $this->StudentRepository->getAllClubs($std_id);
        $content = array(
            'clubs' => $clubs
        );
        return $this->theme->scope('student.dashboard',$content)->render();
    }


}
