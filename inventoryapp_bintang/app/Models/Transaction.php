<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Sesuaikan dengan kolom dari migrasi Anda
    protected $fillable = [
        'product_id',
        'user_id',
        'type',
        'amount', // Menggunakan 'amount' bukan 'quantity'
        'notes',  // Menambahkan 'notes'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}