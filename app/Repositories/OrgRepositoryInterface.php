<?php
namespace App\Repositories;

interface OrgRepositoryInterface{
    
    public function getAllClubs();

    public function getMembers($id);

    public function getInformation($id);

    public function getMembersAmount($id);

    public function getRegistryInfos($id);
}