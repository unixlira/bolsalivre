<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'products';
    protected $guarded = ['id'];


    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    { 
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true,
            ]
        ];
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function institutions()
    {
        return $this->belongsToMany(Institution::class);
    }
}
 