<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $incrementing = false;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

}
