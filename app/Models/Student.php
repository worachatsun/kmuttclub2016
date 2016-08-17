<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'std_id';

    public function clubs(){
        return $this->belongToMany('App\Models\Club');
    }
}
