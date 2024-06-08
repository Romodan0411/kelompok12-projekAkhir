<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = ['judul', 'pengarang', 'deskripsi', 'cover'];

    public function kategori()
    {
        return $this->belongsToMany(Categori::class, 'buku_categori', 'buku_id', 'categori_id');
    }
}
