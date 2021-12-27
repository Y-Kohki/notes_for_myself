<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customs extends Model
{
    public function starbucks()
    {
        return $this->belongsToMany('App\Starbucks');
    }
    
    protected $table = 'customs';
}
