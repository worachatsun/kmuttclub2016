<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Repositories\OrgRepositoryInterface;

class OrgController extends Controller
{
    protected $OrgRepository;

    public function __construct(OrgRepositoryInterface $OrgRepository){
        $this->OrgRepository = $OrgRepository;
    }

    public function getAllClubs(){
        $clubs = $this->OrgRepository->getAllClubs();
        return json_decode($clubs,true);
    }

    public function getAllClubMembers($id){
        $members = $this->OrgRepository->getMembers($id);
        $memberAmount = $this->OrgRepository->getMembersAmount($id);

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
