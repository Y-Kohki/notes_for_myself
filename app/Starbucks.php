<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Starbucks extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'original_drink',
        'drink',
        'memo',
        'evaluation',
    ];
    
    protected $table = 'starbucks';
    
    public function customs()
    {
        return $this->belongsToMany('App\Customs');
    }
}
