<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Theme;
use Auth;

class ACMBaseController extends Controller
{
	protected $user;
    public function __construct (){

        $this->theme = Theme::uses('alchemist')->layout('default');

         //temporary fix for null $user problem = =
        //$this->user = Auth::user();

        // if(isset($this->user)){
        //     //$this->notification =  $this->user->getNotificationsNotRead();
        //     $this->theme->partialComposer("headerhome", function($view){
        //         $view->with('user',$this->user);
        // 		//$view->with('notification',$this->notification);
        //     });
        // }else{
        //     //echo "user is null";
        //     redirect("auth/login");
        //     header("Location: auth/login");
        //     die();
        // }

    }
}
