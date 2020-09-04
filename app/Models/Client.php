<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function gateway1()
    {
        return $this->belongsTo('App\Models\Gateway', 'gateway_1', 'id');
    }

    public function gateway2()
    {
        return $this->belongsTo('App\Models\Gateway', 'gateway_2', 'id');
    }

    public function outlet()
    {
        return $this->hasMany('App\Models\Outlet');
    }

    public function transaction()
    {
        return $this->hasMany('App\Models\Transaction');
    }

    public function balance()
    {
        return $this->hasMany('App\Models\Balance');
    }


}
