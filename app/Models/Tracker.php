<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Tracker extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'email',
        'user_id',
        'state_id'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function targets()
    {
        return $this->hasMany(Target::class);
    }
}
