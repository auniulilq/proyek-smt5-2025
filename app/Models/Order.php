<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
      protected $fillable = [
        'user_id',
        'tanggal',
        'total',
        'bukti_pembayaran',
        'status_pembayaran',
    ];
    public function user()
    {
      
        return $this->belongsTo(User::class);
    }
}
