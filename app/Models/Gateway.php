<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gateway extends Model
{
    public function transaction()
    {
        return $this->hasMany('app\Models\Transaction');
    }

    public function balance()
    {
        return $this->hasMany('App\Models\Balance');
    }
}
