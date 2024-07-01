<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\LandRecoveryLocation;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;



class IndoregionController extends Controller
{
    public function addlahan()
    {

        $provinces = Province::where('id', 63)->get();
        $regencies = Regency::where('province_id', 63)->get();

        return view('addlahan', compact('provinces', 'regencies'));
    }


    public function getkecamatan(Request $request)
    {
        $id_kabupaten = $request->input('id_kabupaten');
        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        $options = '<option value="">Pilih Salah Kecamatan..</option>';
        foreach ($kecamatans as $kecamatan) {
            $options .= '<option value="' . $kecamatan->id . '">' . $kecamatan->name . '</option>';
        }

        return response()->json(['options' => $options]);
    }

    public function getDesa(Request $request)
    {
        $id_kecamatan = $request->input('id_kecamatan');
        $desas = Village::where('district_id', $id_kecamatan)->get();

        $options = '<option value="">Pilih Desa..</option>';
        foreach ($desas as $desa) {
            $options .= '<option value="' . $desa->id . '">' . $desa->name . '</option>';
        }

        return response()->json(['options' => $options]);
    }

    public function insertdata(Request $request) {
        dd($request->all());
        LandRecoveryLocation::create([
            $request->all()
        ]);
    }
}
