<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function getKecamatanByKabupatenId($id)
    {
        $kecamatan = District::where('regency_id', $id)->get();
        return response()->json($kecamatan);
    }
}
