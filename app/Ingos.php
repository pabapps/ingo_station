<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingos extends Model
{
    protected $table = 'ingos';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
