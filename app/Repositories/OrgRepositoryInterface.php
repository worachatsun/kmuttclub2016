<?php
namespace App\Repositories;

interface OrgRepositoryInterface{
    
    public function getAllClubs();

    public function getClubMembers($id);

    public function getInformation($id);

    public function getClubMembersAmount($id);

    public function getRegistryInfos($id);
    
}