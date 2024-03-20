<?php

namespace App\Http\Controllers;

use App\Models\Anfar;
use Illuminate\Http\Request;

class AnfarController extends Controller
{
    function listAnfar()
    {
        $anfar = Anfar::orderBy('tgl_peresepan', 'DESC')
            ->select('nm_pasien', 'no_resep', 'tgl_peresepan', 'status')
            ->join('reg_periksa', 'reg_periksa.no_rawat', '=', 'resep_obat.no_rawat')
            ->join('pasien', 'pasien.no_rkm_medis', '=', 'reg_periksa.no_rkm_medis')
            ->where('tgl_penyerahan', '0000-00-00')
            ->limit(100)
            ->get();
        return response()->json($anfar);
    }
    function displayAnfar()
    {
        $displayAnfar = Anfar::orderBy('tgl_peresepan', 'DESC')
            ->select('nm_pasien', 'no_rawat')
            ->join('reg_periksa', 'reg_periksa.no_rawat', '=', 'resep_obat.no_rawat')
            ->join('pasien', 'pasien.no_rkm_medis', '=', 'reg_periksa.no_rkm_medis')
            ->where('tgl_penyerahan', '2024-03-18')
            // ->where('status', 'ralan')
            ->limit(100)
            ->get();
        return response()->json($displayAnfar);
    }
}
