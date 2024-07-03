<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\LandRecoveryLocation;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class LocationController extends Controller
{

    public function index()
    {
        $locations = LandRecoveryLocation::with(['regency', 'district', 'village'])->get();

        return view('lahan', compact('locations'));
    }

    public function showLocations()
    {
        $locations = LandRecoveryLocation::with(['regency', 'district', 'village'])->get();
        return view('lokasi', compact('locations'));
    }


    public function create()
    {
        $provinces = Province::all();
        $regencies = Regency::all();
        return view('addlahan', compact('provinces', 'regencies'));
    }

    public function edit($id)
    {
        $location = LandRecoveryLocation::findOrFail($id);
        $province_id = 63; // Province ID for Kalimantan Selatan
        $provinces = Province::where('id', $province_id)->get();
        $regencies = Regency::where('province_id', $province_id)->get();
        $districts = District::whereHas('regency', function ($query) use ($province_id) {
            $query->where('province_id', $province_id);
        })->get();
        $villages = Village::whereHas('district.regency', function ($query) use ($province_id) {
            $query->where('province_id', $province_id);
        })->get();

        return view('addlahan', compact('location', 'provinces', 'regencies', 'districts', 'villages'));
    }

    public function update(Request $request, $id)
    {
        $location = LandRecoveryLocation::findOrFail($id);

        // Validasi dan update data
        $location->provinsi = $request->provinsi;
        $location->kabupaten = $request->kabupaten;
        $location->kecamatan = $request->kecamatan;
        $location->desa = $request->desa;
        $location->Alamat = $request->Alamat;
        $location->Latitude = $request->Latitude;
        $location->Longitude = $request->Longitude;
        $location->LuasLahan = $request->LuasLahan;
        $location->JumlahBibit = $request->JumlahBibit;
        $location->BibitID = $request->JenisBibit;
        $location->nama_lokasi = $request->nama_lokasi; 

        if ($request->hasFile('inputFoto')) {
            $path = $request->file('inputFoto')->store('public');
            $location->Dokumentasi = basename($path);
        }

        if ($request->hasFile('inputFileKML')) {
            $path = $request->file('inputFileKML')->store('public');
            $location->KMLFile = basename($path);
        }

        $location->save();

        return redirect()->route('lahan.index')->with('success', 'Data lahan berhasil diperbarui');
    }

    public function store(Request $request)
    {
        // Validasi dan simpan data baru
        $location = new LandRecoveryLocation();
        $location->provinsi = $request->provinsi;
        $location->kabupaten = $request->kabupaten;
        $location->kecamatan = $request->kecamatan;
        $location->desa = $request->desa;
        $location->Alamat = $request->Alamat;
        $location->Latitude = $request->Latitude;
        $location->Longitude = $request->Longitude;
        $location->LuasLahan = $request->LuasLahan;
        $location->JumlahBibit = $request->JumlahBibit;
        $location->BibitID = $request->JenisBibit;
        $location->nama_lokasi = $request->nama_lokasi; 

        if ($request->hasFile('inputFoto')) {
            $path = $request->file('inputFoto')->store('public');
            $location->Dokumentasi = basename($path);
        }

        if ($request->hasFile('inputFileKML')) {
            $path = $request->file('inputFileKML')->store('public');
            $location->KMLFile = basename($path);
        }

        $location->save();

        return redirect()->route('lahan.index')->with('success', 'Data lahan berhasil ditambahkan');
    }
    public function destroy($id)
    {
        $location = LandRecoveryLocation::findOrFail($id);
        $location->delete();

        return redirect()->route('lahan.index')->with('success', 'Data berhasil dihapus.');
    }

    public function getKMLFile($id)
    {
        $location = LandRecoveryLocation::findOrFail($id);
        $filePath = storage_path('app/public/' . $location->KMLFile);

        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            return response()->json(['message' => 'File not found'], 404);
        }
    }
}
