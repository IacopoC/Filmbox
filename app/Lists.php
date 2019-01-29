<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
    public function users()
    {
        return $this->belongsTo('App\Users');
    }
}
