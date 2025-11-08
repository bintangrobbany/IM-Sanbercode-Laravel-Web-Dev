<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'age',
        'biodata',
        'user_id',
    ];

    // Relasi: Satu Profil ini dimiliki oleh satu User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}