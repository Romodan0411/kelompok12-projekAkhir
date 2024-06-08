<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buku_categori extends Model
{
    use HasFactory;

    protected $table = 'buku_categori';

    protected $fillable = ['buku_id', 'categori_id'];
}
