<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    use HasFactory;
    protected $table = 'kategori_buku';
    protected $fillable = ['nama', 'deskripsi'];

    public function buku()
    {
        return $this->belongsToMany(Buku::class, 'buku_categori', 'categori_id', 'buku_id');
    }
}
