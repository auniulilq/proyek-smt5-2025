<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Nama tabel secara default sudah 'products' (jamak dari Product), jadi tidak perlu didefinisikan lagi.

    /**
     * The attributes that are mass assignable.
     * Kolom yang aman untuk diisi menggunakan mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'kategori_id',
        'nama',
        'deskripsi',
        'harga',
        'stok',
        'foto',
    ];

    /**
     * The attributes that should be cast.
     * Mengubah tipe data kolom saat diambil dari database.
     *
     * @var array
     */
    protected $casts = [
        // Mengubah 'harga' (decimal) menjadi float
        'harga' => 'float', 
        // Mengubah 'stok' (int) menjadi integer
        'stok' => 'integer', 
    ];

    // -----------------------------------------------------------------
    // DEFINISI RELATIONSHIP (HUBUNGAN)
    // -----------------------------------------------------------------

    /**
     * Mendefinisikan relasi Many-to-One: Sebuah Product DIMILIKI oleh satu Kategori.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function kategori()
    {
        // Karena Foreign Key di tabel Anda adalah 'kategori_id' (bukan 'category_id'), 
        // kita harus menentukannya sebagai argumen kedua.
        return $this->belongsTo(Category::class, 'kategori_id');
    }
    
    /**
     * Mendefinisikan relasi Many-to-Many melalui tabel orderproducts.
     * Ini memungkinkan Anda melihat semua pesanan yang berisi produk ini.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        // Asumsi Model OrderProduct sudah Anda buat (seperti yang kita bahas sebelumnya)
        // Kita gunakan hasMany karena foreign key 'product_id' ada di OrderProduct.
        return $this->hasMany(OrderProduct::class);
    }
}