<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    /**
     * Get the comments for the blog post.
     */
    public function city()
    {
        return $this->hasMany('App\City');
    }
}
