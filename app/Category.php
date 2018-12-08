<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
    use Sluggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'internal_category',
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
                'source' => 'internal_category',
                'onUpdate' => true,
            ]
        ];
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategory::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public static function produtoDeUmaCategoria($id)
    {
        return DB::table('category_product as c_p')
        ->where('c_p.category_id', $id)
        ->join('products as p', 'p.id', '=', 'c_p.product_id')
        ->select('p.name', 'p.slug', 'p.id')
        ->first();
    }
}
