<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkWithUs extends Model
{
    protected $table = 'work_with_uses';
    protected $guarded = ['id'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text',
    ];
}
 