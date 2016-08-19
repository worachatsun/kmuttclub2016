<?php
namespace App\Repositories;

interface RegisterRepositoryInterface
{
    public function fb_email_regis($fb,$email,$detail_ldap);
}
