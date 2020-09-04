<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function gateway()
    {
        return $this->belongsTo('App\Models\Gateway');
    }

    public static function countPayoutsRequest()
    {
        return Payout::where('status', 'created')->count('id');
    }


}
