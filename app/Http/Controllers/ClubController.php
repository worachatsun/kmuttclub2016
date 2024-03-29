<?php

namespace App\Http\Controllers;


use App\Repositories\ClubRepositoryInterface;
use Illuminate\Http\Request;
use Input;
use Session;
use Validator;
use Excel;

class ClubController extends ACMBaseController
{

    protected $ClubRepository;
    protected $club_secret_code;
    protected $club_id;

    public function __construct(ClubRepositoryInterface $ClubRepository){
        parent::__construct();
        $this->ClubRepository = $ClubRepository;
    }


    public function getIndex(){
      return redirect('club/dashboard');
    }

    public function getDashboard(){
      $std_id = array_get($this->user,'username');
      $role = $this->ClubRepository->checkRole($std_id);
      $club_secret_code = $this->ClubRepository->getClubSecretCode($role);
      if (is_null($role)||$role==="") {
        return redirect('/');
      }elseif($role==='43'){
        return redirect('alchemist');
      }else{
        $club = $this->ClubRepository->getClubInfo($club_secret_code);
        $member_amount = $this->ClubRepository->getMemberAmount($role);
        $members = $this->ClubRepository->getAllMembers($role);
        $content = array(
            'club' => $club,
            'member_amount' => $member_amount,
            'members' => $members,
            'role' => $role
        );
        return $this->theme->scope('club.dashboard',$content)->layout('org')->render();
      }
    }

    public function getRegis()
    {
        return $this->theme->scope('club.regis')->layout('org')->render();
    }
    
    public function postRegis()
    {
       $secret_code = Input::get('club_id');
       if($secret_code == null){
            return redirect('/club/regis');
        }
       $this->ClubRepository->studentEnroll($secret_code, Session::get('club_secret')['0']->club_secret_code);
       return redirect("club/dashboard");

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

    public function postConfirmclub(){
      $data = Input::all();
      $std_id = array_get($this->user,'username');
      $rules = array(
          'club_id' => 'required|min:5|max:5'
      );
      $messages = array(
          'club_id.required' => 'Club ID field is required.',
          'club_id.min' => 'Club ID field has to be 5 chars long.',
          'club_id.max' => 'Club ID field has to be 5 chars long.'
      );

      $validator = Validator::make($data,$rules,$messages);

      $check_club = $this->ClubRepository->checkClub(array_get($data,'club_id'));
      $check_duplicate_club = $this->ClubRepository->checkDuplicateClub($std_id,array_get($data,'club_id'));

      if ($validator->fails()) {
        $messages = $validator->messages();
        return redirect('club/addclub')->withErrors($validator);
      }elseif(is_null($check_club)){
        $error['club'] = 'This club not available.';
        return redirect('club/addclub')->withErrors($error);
      }elseif(!is_null($check_duplicate_club)){
        $error['club'] = 'You already registed this club.';
        return redirect('club/addclub')->withErrors($error);
      } else {
        $club_info = $this->ClubRepository->getClubInfo(array_get($data,'club_id'));
        return $this->theme->scope('confirmclub',$club_info)->layout('std')->render();
      }
    }

    public function getReport(){

      $std_id = array_get($this->user,'username');
      $role = $this->ClubRepository->checkRole($std_id);
      $club_secret_code = $this->ClubRepository->getClubSecretCode($role);
      $club = $this->ClubRepository->getClubInfo($club_secret_code);
      $this->member = $this->ClubRepository->getAllMembers($role);
      Excel::create("[REPORT]_".$club['club_name'], function($excel) {

            $excel->sheet("REPORT", function($sheet) {
              $data = array();

              array_push($data,array('#','STUDENT ID','NAME - SURNAME','FACULTY','EMAIL','FACEBOOK'));

              foreach ( $this->member as $key => $c) {

                array_push($data, array(
                    $key+1,
                    $c["std_id"],
                    $c["name"]." ".$c["surname"],
                    $c["faculty"],
                    $c["email"],
                    $c["facebook"],
                ));
              }

              $sheet->fromArray($data, null, 'A1', false, false);
            });

        })->export('xlsx');
    }

}
