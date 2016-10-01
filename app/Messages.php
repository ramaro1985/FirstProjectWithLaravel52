<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    public function messageTipe()
    {
        return $this->belongsTo('App\messageTipe');
    }
}
