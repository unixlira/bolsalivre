<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//Referente aos pedidos -> PedidoController
class Order extends Model
{
    protected $table = 'orders';
    protected $guarded = ['id'];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
