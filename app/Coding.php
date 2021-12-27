<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coding extends Model
{
    use SoftDeletes;
    protected $table = 'coding';
    
    protected $fillable = [
        'body',
        'title',
    ];
}
