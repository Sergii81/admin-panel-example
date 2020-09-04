<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function gateway()
    {
        return $this->belongsTo('App\Models\Gateway');
    }

//    public function transaction()
//    {
//        return $this->belongsTo('App\Models\Transaction');
//    }
}
