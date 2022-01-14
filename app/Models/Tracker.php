<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
