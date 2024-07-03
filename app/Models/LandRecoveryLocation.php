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
        'nama_lokasi', // Tambahkan ini
    ];

    protected $table = 'land_recovery_locations';

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'kabupaten', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'kecamatan', 'id');
    }

    public function village()
    {
        return $this->belongsTo(Village::class, 'desa', 'id');
    }

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
