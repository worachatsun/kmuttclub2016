<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enroll extends Model
{
    protected $table = 'enrolls';

    public function students(){
        return $this->belongsTo('App\Models\Student','std_id','std_id');
    }
    
}
