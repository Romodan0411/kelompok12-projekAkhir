<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';
    protected $fillable = ['tanggal_pinjaman', 'tanggal_pengembalian', 'member_id', 'buku_id'];

    public function buku()
    {
        return $this->belongsTo(Buku::class, 'buku_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
}
