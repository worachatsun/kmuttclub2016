<?php
namespace App\Repositories;

use App\Models\Student;
use App\User;

class RegisterRepository implements RegisterRepositoryInterface
{

  public function __construct(){
    $this->Student = new Student();
  }

  public function fb_email_regis($data,$detail_ldap){
    $student = new Student();
    $fb = array_get($data,'fb');
    $email = array_get($data,'email');
    $secret = $this->_secret();
    $student->where('std_id',array_get($detail_ldap,'username'))
            ->update(['facebook'=>$fb,'email'=>$email,'secret_code'=>$secret]);
    return 'success';
  }

  private function _secret(){
    $code = substr('BCDEFGHIJKMNOPQRSTUVWXYZ0123456789',rand(34,1),1).
            substr('BCDEFGHIJKMNOPQRSTUVWXYZ0123456789',rand(34,1),1).
            substr('BCDEFGHIJKMNOPQRSTUVWXYZ0123456789',rand(34,1),1).
            substr('BCDEFGHIJKMNOPQRSTUVWXYZ0123456789',rand(34,1),1).
            substr('BCDEFGHIJKMNOPQRSTUVWXYZ0123456789',rand(34,1),1);
    $a = $this->Student->where('secret_code',$code)->first();
    if ($a === null || $a === "") {
    }else{
      $this->_secret();
    }
    return $code;
  }

  public function checkClub($user){
    $student = $this->Student->select('email')->where('std_id',$user)->first();
    return array_get($student,'email');
  }

}
