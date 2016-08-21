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
      $name = explode(' ', array_get($detail_ldap,'name'));
      $student->std_id = array_get($detail_ldap,'username');
      $student->name = array_get($name,'0');
      $student->surname = array_get($name,'1');
      $student->email = $email;
      $student->facebook = $fb;
      $student->faculty = array_get($detail_ldap,'faculty');
      $student->secret_code = $this->_secret();
      $student->save();
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
    $student = $this->Student->where('std_id',$user)->first();
    return $student;
  }

}
