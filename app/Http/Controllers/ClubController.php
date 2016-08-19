<?php

namespace App\Http\Controllers;

use Input;
use Session;
use Validator;
use Illuminate\Http\Request;
use App\Repositories\ClubRepositoryInterface;

class ClubController extends ACMBaseController
{

    protected $ClubRepository;
    protected $club_secret_code;
    protected $club_id;

    public function __construct(ClubRepositoryInterface $ClubRepository){
        parent::__construct();
        $this->ClubRepository = $ClubRepository;
        $this->club_secret_code = 'CTN5R';
        $this->club_id = 22;
    }


    public function getIndex(){
        if (Session::get('club_id') === "" || Session::get('club_id') === null) {
          return $this->theme->layout('login')->scope('club.index')->render();
        }else{
          return redirect('club/dashboard');
        }
    }

    public function postDashboard(){
      $club_id = Input::get('club_id');
      Session::put('club_id', $club_id);
      return redirect('club/dashboard');
    }

    public function getDashboard(){
      if (Session::get('club_id')===""||Session::get('club_id')===null) {
        return redirect('club');
      }
      $club = $this->ClubRepository->getClubInfo(Session::get('club_id'));
      $member_amount = $this->ClubRepository->getMemberAmount(Session::get('club_id'));
      $members = $this->ClubRepository->getAllMembers(Session::get('club_id'));
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
      $rules = array(
          'club_id' => 'required|min:5|max:5'
      );
      $messages = array(
          'club_id.required' => 'Club ID field is required.',
          'club_id.min' => 'Club ID field has to be 6 chars long.',
          'club_id.max' => 'Club ID field has to be 6 chars long.'
      );

      $validator = Validator::make($data,$rules,$messages);

      if ($validator->fails()) {
        $messages = $validator->messages();
        return redirect('club/addclub')->withErrors($validator);
      } else {
        $std_id = array_get($this->user,'username');
        $club_id = $this->ClubRepository->getClubNumber(array_get($data,'club_id'));
        $this->ClubRepository->addClub($std_id,array_get($club_id,'0.club_id'));
        return redirect('student/dashboard');
      }
    }
}
