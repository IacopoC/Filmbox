<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Films extends Model
{
    public function lists()
    {
        return $this->belongsTo('App\Lists');
    }
}
