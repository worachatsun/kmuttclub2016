<?php
namespace App\Repositories;

use App\Models\Student;

class RegisterRepository implements RegisterRepositoryInterface
{

  public function __construct(){
  }

  public function fb_email_regis($fb,$email){
    $student = new Student();
    $student->where('std_id', 0)
            ->update(['email' => $email,'facebook'=>$fb]);
    return 'success';
  }

}
