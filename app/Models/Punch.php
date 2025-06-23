<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Punch extends Model
{
    protected $fillable = ['user_id', 'date', 'note', 'ip_address'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
