<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hewan extends Model
{
    use HasFactory;

    protected $fillable = [
        'foto',
        'jenis',
        'berat',
        'harga',
        'idAdmin',
        'idKategori'
    ];



    public function kategoris()
    {
        return $this->hasOne(Kategori::class);
    }
}
