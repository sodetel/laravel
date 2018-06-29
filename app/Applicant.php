<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $appends = ['fullname' /* getFullnameAttribute */ ];

    function getFullnameAttribute() {
        return $this->name . ' ' . $this->family;
    }
}
