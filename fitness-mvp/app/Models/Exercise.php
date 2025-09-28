<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'date',
        'duration_minutes',
        'calories',
        'notes',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
