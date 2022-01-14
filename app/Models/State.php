<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class State extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function tracker()
    {
        return $this->hasMany(Tracker::class);
    }
}
