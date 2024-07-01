<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandRecoveryLocation extends Model
{
    use HasFactory;

    protected $primaryKey = 'LocationID';

    protected $fillable = [
        'UserID',
        'DesaID',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
        'Alamat',
        'Latitude',
        'Longitude',
        'LuasLahan',
        'JumlahBibit',
        'BibitID',
        'Dokumentasi',
        'KMLFile',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'UserID');
    }

    public function bibit()
    {
        return $this->belongsTo(Bibit::class, 'BibitID');
    }

    public function desa()
    {
        return $this->belongsTo(Village::class, 'DesaID');
    }
}
