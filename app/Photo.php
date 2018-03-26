<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title', 'photo'];
    public function blog()
    {
      return $this->belongsTo(Blog::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
