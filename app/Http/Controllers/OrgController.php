<?php

namespace App\Http\Controllers;

use App\Repositories\OrgRepositoryInterface;

class OrgController extends ACMBaseController
{

    protected $OrgRepository;

    public function __construct(OrgRepositoryInterface $OrgRepository){
        parent::__construct();
        $this->OrgRepository = $OrgRepository;
    }

    public function getIndex(){
        $collection = array(
            'clubs' => $this->OrgRepository->getAllClubs()
        );
        return $this->theme->scope('organization.index',$collection)->render();
    }

    public function getClub($club_id = null){
        // check null
        if($club_id == null){
            return redirect('/organization');
        }

        $collection = array(
            'club' => $this->OrgRepository->getClubInfo($club_id),
            'club_members' => $this->OrgRepository->getClubMembers($club_id)->count(),
            'members' => $this->OrgRepository->getClubMembers($club_id)
        );

        return $this->theme->scope('organization.club',$collection)->render();

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