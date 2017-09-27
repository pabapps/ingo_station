<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailDomain extends Model
{
    protected $table = 'email_domain';
    public $timestamps = false;
    protected $primaryKey = 'id';
}
