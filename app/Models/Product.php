<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
      'id',
      'gambar',
      'nama',
      'desc_produk',
      'harga',
      'gambar'
    ];
}