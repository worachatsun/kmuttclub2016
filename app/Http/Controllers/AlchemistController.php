<?php

namespace App\Http\Controllers;

use App\Repositories\AlchemistRepositoryInterface;

class AlchemistController extends ACMBaseController{
    protected $AlchemistRepository;

    public function __construct(AlchemistRepositoryInterface $AlchemistRepository){
        parent::__construct();
        $this->AlchemistRepository = $AlchemistRepository;
    }

    public function getIndex(){
      
    }
}
