<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    protected $table = 'clubs';

    public function students(){
        return $this->belongToMany('App\Models\Student', 'enrolls','std_id','std_id');
    }
}
