<?php

namespace App\Http\Controllers;

use App\Models\LandRecoveryLocation;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class LandRecoveryController extends Controller
{
    // Menampilkan form tambah data
    public function create()
    {
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('land_recovery.create', compact('provinces', 'regencies'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'provinsi' => 'required|string|max:255',
            'kabupaten' => 'required|string|max:255',
            'kecamatan' => 'required|string|max:255',
            'desa' => 'required|string|max:255',
            'Alamat' => 'required|string|max:255',
            'Latitude' => 'required|numeric',
            'Longitude' => 'required|numeric',
            'LuasLahan' => 'required|numeric',
            'JumlahBibit' => 'required|integer',
            'JenisBibit' => 'required|string|max:255',
            'Dokumentasi' => 'nullable|image',
            'KMLFile' => 'nullable|file|mimes:kml',
        ]);

        $landRecovery = new LandRecoveryLocation();
        $landRecovery->provinsi = $request->provinsi;
        $landRecovery->kabupaten = $request->kabupaten;
        $landRecovery->kecamatan = $request->kecamatan;
        $landRecovery->desa = $request->desa;
        $landRecovery->Alamat = $request->Alamat;
        $landRecovery->Latitude = $request->Latitude;
        $landRecovery->Longitude = $request->Longitude;
        $landRecovery->LuasLahan = $request->LuasLahan;
        $landRecovery->JumlahBibit = $request->JumlahBibit;
        $landRecovery->BibitID = $request->JenisBibit;

        if ($request->hasFile('Dokumentasi')) {
            $landRecovery->Dokumentasi = $request->file('Dokumentasi')->store('dokumentasi');
        }

        if ($request->hasFile('KMLFile')) {
            $landRecovery->KMLFile = $request->file('KMLFile')->store('kml_files');
        }

        $landRecovery->save();

        return redirect()->route('land_recovery.index')->with('success', 'Data pemulihan lahan berhasil ditambahkan.');
    }
}
