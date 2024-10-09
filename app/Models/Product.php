<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    // protected $primaryKey = 'item_id';

    protected $fillable = [
      'item_id',
      'gambar',
      'nama',
      'desc_produk',
      'harga',
      'gambar',
      'stok',
    ];

    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'item_id','item_id');
    }
}