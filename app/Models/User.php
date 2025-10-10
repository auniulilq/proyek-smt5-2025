<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


class User extends Authenticatable 
{
    use HasFactory, Notifiable;

    /**
     * Kolom-kolom yang boleh diisi (Mass Assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', 
        'alamat',
        'telepon',
    ];

    /**
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token', 
    ];

    /**
     * 
     *
     * @var array<string, string>
     */
    protected $casts = [
        // Agar 'email_verified_at' (jika ada) diubah menjadi objek Carbon Date
        // 'email_verified_at' => 'datetime', 
        
        // Memastikan password di-hash saat disimpan (Meskipun ini lebih baik dilakukan di Controller atau Mutator)
        'password' => 'hashed', 
    ];

    // -----------------------------------------------------------------
    // DEFINISI RELATIONSHIP (HUBUNGAN)
    // -----------------------------------------------------------------

    /**
     * Mendefinisikan relasi One-to-Many: Satu User dapat memiliki banyak Order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders()
    {
        // Secara default akan mencari foreign key 'user_id' di tabel 'orders'
        return $this->hasMany(Order::class);
    }
}
