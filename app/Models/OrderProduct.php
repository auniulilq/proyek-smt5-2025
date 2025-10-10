<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


    class OrderProduct extends Model
{
    use HasFactory;

    
    protected $table = 'orderproducts'; 

    
    protected $fillable = [
        'order_id',
        'product_id',
        'jumlah',
        'harga_satuan',
    ];

     public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * OrderProduct ini mereferensikan satu Product.
     * (Foreign Key: product_id)
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
