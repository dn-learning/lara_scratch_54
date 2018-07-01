<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // one way to deal with m.assignment - fields below are accepted:
    protected $fillable = ['title','body'];

    // one can also block fields like below, leaving it empty would allow all:
    protected $guarded = ['user_id'];
}
