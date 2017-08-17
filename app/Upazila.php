<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $table = 'upazilas';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
