<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    protected $table = 'book';
    protected $fillable = [
        'book','author','publication','language'
    ];
    public $timestamps = true;
    
}
