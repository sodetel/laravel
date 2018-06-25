<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    // protected $table = 'my_plans';
    // public $primaryKey = 'planid';

    function Applications() {
        return $this->hasMany('App\Application');
    }
}
