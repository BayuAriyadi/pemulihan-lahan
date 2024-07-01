<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;



class IndoregionController extends Controller
{
    public function addlahan()
    {

        $provinces = Province::where('id', 63)->get();
        
        return view('addlahan', compact('provinces'));
    }

    public function getkabupaten(Request $request) {
        $id_provinsi = $request->id_provinsi;

        $kabupatens = Regency::where('province_id', $id_provinsi)->get();
        foreach ($kabupatens as $kabupaten) {
            echo "<option value='$kabupaten->id'>$kabupaten->name</option>";
        }
    }
}
