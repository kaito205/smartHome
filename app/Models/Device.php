<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;


    // Definisikan kolom yang bisa diisi (fillable)
    protected $fillable = ['name', 'status'];

    // Tipe data untuk kolom
    protected $casts = [
        'status' => 'boolean',
    ];
}
