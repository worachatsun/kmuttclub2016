<?php
namespace App\Repositories;

interface PrivilegeRepositoryInterface
{
    public function register($id_card, $birth_date);
}
