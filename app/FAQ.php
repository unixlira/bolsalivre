<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;


class FAQ extends Model
{ 
    use SoftDeletes;
    use Sluggable;

    protected $table = 'faqs';
    protected $guarded = ['id'];

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question', 'answer',
    ];
    

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'question',
                'onUpdate' => true,
            ]
        ];
    }
}
