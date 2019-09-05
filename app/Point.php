<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $fillable = ['user_id', 'badge_id','point','description'];

    public function badge()
    {
        return $this->belongsTo('App\Badge');
    }
}
