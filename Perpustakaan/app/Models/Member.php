<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'member';
    protected $fillable = ['nama', 'alamat', 'no_hp', 'email'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'member_id');
    }
}
