<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order_tx';
    // protected $primaryKey = 'order_id';

    protected $fillable = ['order_id','order_date','customer_id','order_total','order_status'];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id','order_id');
    }
}
