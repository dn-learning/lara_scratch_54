<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // one way to deal with m.assignment - fields below are accepted:
    protected $fillable = ['title','body'];

    // one can also block fields like below, leaving it empty would allow all:
    // protected $guarded = ['user_id'];

    public function addComment($body)
    {
        // one way to do it:
        // Comment::create([
        //     'body'      => $body,
        //     'post_id'   => $this->id
        // ]);

        //refactor taking into account lara's way:
        $this->comments()->create(compact('body'));
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
