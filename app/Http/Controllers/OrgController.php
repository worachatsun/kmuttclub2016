<?php

namespace App\Http\Controllers;

use App\Repositories\OrgRepositoryInterface;
use Excel;

class OrgController extends ACMBaseController
{

    protected $OrgRepository;

    public function __construct(OrgRepositoryInterface $OrgRepository){
        parent::__construct();
        $this->OrgRepository = $OrgRepository;
    }

    public function getIndex(){
      $std_id = array_get($this->user,'username');
      $role = $this->OrgRepository->checkRole($std_id);
      $club_secret_code = $this->OrgRepository->getClubSecretCode($role);
      if($role==='44'){
        $collection = array(
            'clubs' => $this->OrgRepository->getAllClubs(),
            'user' => $this->user
        );
        return $this->theme->scope('organization.index',$collection)->render();
      }else{
        return redirect('/');
      }

    }

    public function getClub($club_id = null){
        // check null
        if($club_id == null){
            return redirect('/organization');
        }

        $std_id = array_get($this->user,'username');
        $role = $this->OrgRepository->checkRole($std_id);
        $club_secret_code = $this->OrgRepository->getClubSecretCode($role);
        if($role==='44'){
          $collection = array(
              'club' => $this->OrgRepository->getClubInfo($club_id),
              'club_members' => $this->OrgRepository->getClubMembers($club_id)->count(),
              'members' => $this->OrgRepository->getClubMembers($club_id)
          );

          return $this->theme->scope('organization.club',$collection)->render();
        }else{
          return redirect('/');
        }

    }

    public function getReport(){

        Excel::create('Report', function($excel) {

            $excel->sheet('ALL CLUB', function($sheet) {
                
                $data = array();

                array_push($data,array('#','CLUB NAME','SECRET CODE','MEMBERS'));
                
                foreach ($this->OrgRepository->getAllClubs() as $club) {
                    array_push($data, json_decode($club,true));
                }

                $sheet->fromArray($data, null, 'A1', false, false);
            });

            foreach ($this->OrgRepository->getAllClubs() as $club) {
                $this->club = $club;
                
                $excel->sheet($club["club_name"], function($sheet) {
                    $data = array();

                    array_push($data,array('#','STUDENT ID','NAME - SURNAME','FACULTY','EMAIL','FACEBOOK'));
                    
                    foreach ($this->OrgRepository->getClubMembers($this->club["club_id"]) as $key => $c) {
                        array_push($data, array(
                            $key+1,
                            $c["std_id"],
                            $c["name"] + $c["surname"]+"",
                            $c["faculty"],
                            $c["email"],
                            $c["facebook"],
                        ));
                    }

                    $sheet->fromArray($data, null, 'A1', false, false);

                });
            }

        })->export('xlsx');        
        
    }
}
