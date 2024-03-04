<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'nama_admin',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $guard = 'admin';
    protected $primaryKey = 'idAdmin';


    public function mencatat_pengeluaran()
    {
        return $this->hasOne(Pengeluaran::class);
    }

    public function mencatat_pendapatan()
    {
        return $this->hasOne(Pendapatan::class);
    }

    public function mengelola()
    {
        return $this->hasOne(Hewan::class);
    }

    public function menangani()
    {
        return $this->hasOne(Pesanan::class);
    }
}
