<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class UserManagement extends Model
{
    public $timestamps  = true;
    protected $table = 'users';
    protected $fillable = [
        'name','email','contact_number','password','role'
    ];
    
}
