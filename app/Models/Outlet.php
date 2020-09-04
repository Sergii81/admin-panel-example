<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
