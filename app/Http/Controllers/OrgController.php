<?php

namespace App\Http\Controllers;

use App\Repositories\OrgRepositoryInterface;
use App\Repositories\ClubRepositoryInterface;

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

    // Base
    public function getAllClubs(){
        $clubs = $this->OrgRepository->getAllClubs();
        return json_decode($clubs,true);
    }

    public function getAllClubMembers($id){
        $members = $this->OrgRepository->getClubMembers($id);
        $memberAmount = $this->OrgRepository->getClubMembersAmount($id);

        $collection = collect(['members'=>$members, "amount"=>$memberAmount]);
        return $collection;
    }

    public function getMemberInfos($id){
        return $this->OrgRepository->getInformation($id);
    }

    public function getStudentClub($stdId){
        return $this->OrgRepository->getRegistryInfos($stdId);
    }


}
