<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'alamat_kirim',
        'no_whatsapp',
        'nama_penerima',
        'idHewan',
        'idPengguna',
    ];

    protected $primaryKey = 'idPesanan';


    public function dikelola()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function hewan()
    {
        return $this->belongsTo(Hewan::class, 'idHewan');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'idPengguna');
    }
}
