<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'user_agent',
        'tracker_id',
    ];

    public $timestamps = false;
}
