<?php

namespace App\Http\Controllers;


use App\Repositories\ClubRepositoryInterface;
use Illuminate\Http\Request;
use Input;
use Session;

class ClubController extends ACMBaseController
{

    protected $ClubRepository;
    protected $club_secret_code;
    protected $club_id;

    public function __construct(ClubRepositoryInterface $ClubRepository){
        parent::__construct();
        $this->ClubRepository = $ClubRepository;
        $this->club_secret_code = 'CTN5R';//waiting 4 get session
        $this->club_id = 22;//waiting 4 get session
    }


    public function getIndex(){
        return $this->theme->layout('login')->scope('club.index')->render();
    }

    public function getDashboard($club_id){
        $club_id = $this->club_id;
        $club = $this->ClubRepository->getClubInfo($club_id);

        $member_amount = $this->ClubRepository->getMemberAmount($club_id);
        $members = $this->Club2Repository->getAllMembers($club_id);
        $content = array(
            'club' => $club,
            'member_amount' => $member_amount,
            'members' => $members
        );
        return $this->theme->scope('club.dashboard',$content)->render();
    }

    public function getClublogout(){
        Session::forget('club_id');
        return redirect('club');
    }

    public function getRegis()
    {

        return $this->theme->scope('club.regis')->layout('blank')->render();
    }



    public function postRegis()
    {
       $secret_code = Input::get('sc');
       if($secret_code == null){
            return redirect('/club/regis');
        }
       $this->ClubRepository->studentEnroll($secret_code,$this->club_secret_code);
       return $this->theme->scope('club.regis')->layout('blank')->render();

    }

    public function getAddclub(){
      $data = $this->user;
      return $this->theme->scope('club',$data)->layout('blank')->render();
    }

    public function postAddclub(){
        $data = Input::all();
        $std_id = array_get($this->user,'username');
        $club_id = $this->ClubRepository->getClubNumber(array_get($data,'club_id'));
        $this->ClubRepository->addClub($std_id,array_get($club_id,'0.club_id'));
        return redirect('student/dashboard');
    }
}
