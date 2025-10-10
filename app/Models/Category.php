<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
     protected $fillable = [
        'nama',
     ];

     public function products()
    {
        // Asumsi: Ada foreign key 'category_id' di tabel 'products'
        return $this->hasMany(Product::class);
    }
}
