<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDo extends Model
{
    use SoftDeletes;
    protected $table = 'to_do';
    protected $fillable = [
        'start_time',
        'end_time',
        'title',
    ];
    protected $dates = [
        'start_time',
        'end_time',
    ];

}
