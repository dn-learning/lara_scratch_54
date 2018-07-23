<?php

namespace App;

use Carbon\Carbon;
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

    public function scopeFilter($query, $filters)
    {
        if ($filters) {
            $periodStart = Carbon::Parse($filters)->format('Y-m');
            $periodEnd = Carbon::Parse($filters)->addMonth()->format('Y-m');

            $query = $query->where('created_at', '>=', $periodStart."-01")
                    ->where('created_at', '<', $periodEnd."-01");
        }
    }

    public static function archives()
    {
        return static::latest()
            ->get(['id','created_at'])
            ->groupBy(function ($date) {
                return Carbon::Parse($date->created_at)->format('F Y');
            });
    }
}
