<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'UserID'; // Sesuaikan dengan primary key tabel Anda

    protected $fillable = [
        'Username',
        'Password',
        'FullName',
        'NIK',
        'Institution',
        'Role',
    ];

    protected $hidden = [
        'Password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['Password'] = Hash::make($value); // Menggunakan bcrypt untuk hashing password
    }

    public function getAuthPassword()
    {
        return $this->Password;
    }
}
