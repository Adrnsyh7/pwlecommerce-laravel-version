<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $primaryKey = 'detail_id';

    protected $fillable = ['order_id','item_id','quantity','subtotal'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }


    public function menuItem()
    {
        return $this->belongsTo(Product::class, 'item_id', 'item_id');
    }
}
