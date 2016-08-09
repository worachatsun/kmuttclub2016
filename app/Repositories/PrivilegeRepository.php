<?php
namespace App\Repositories;

use App\Models\Privilege;
use DateTime;
class PrivilegeRepository implements PrivilegeRepositoryInterface
{
    protected $Privilege;

    public function __construct(){
		$this->Privilege = new Privilege();
	}

    public function register($id_card, $birth_date){
        $this->Privilege = new Privilege();
        $this->Privilege->id_card = $id_card;
        $this->Privilege->birth_date = $birth_date;
        $this->Privilege->save();
        return ($this->Privilege);
    }

    public function get($id_card){
        $data = $this->Privilege->where('id_card', $id_card)->get();
        return json_encode($data);
    }

    public function redeem($id_card){
        $data = $this->Privilege->where('id_card', $id_card)->first();
        $data->is_redeem = 1;
        $data->save();
        return ($data);
    }
}
