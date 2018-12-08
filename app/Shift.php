<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    public function institutions()
    {
        return $this->belongsToMany(Institution::class);
    }

    public function scholarship()
    {
        return $this->hasMany(Scholarship::class);
    }
}
