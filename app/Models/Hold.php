<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hold extends Model
{
    public function transaction()
    {
        return $this->belongsTo('App\Models\Transaction');
    }
}
