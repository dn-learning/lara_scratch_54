<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // wrapping query
    // public static function incomplete()
    // {
    //     return static::where('completed', 0)->get();
    // }

    // better as it allows chaining is query scope
    public function scopeIncomplete($query)
    {
        return $query->where('completed', 0);
    }
}
