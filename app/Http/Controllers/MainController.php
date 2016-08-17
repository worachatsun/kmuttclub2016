<?php

namespace App\Http\Controllers;

use Theme;
use Input;

use App\Repositories\PrivilegeRepositoryInterface;
use DateTime;

class MainController extends ACMBaseController
{

    public function __construct(){
        parent::__construct();
    }

    public function getEnroll(){
        return $this->theme->scope('home.enrollment')->render();
    }
    
    public function getIndex(){
        return $this->theme->scope('home.index')->render();
    }
    
}
