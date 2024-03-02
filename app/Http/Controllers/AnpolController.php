<?php

namespace App\Http\Controllers;

use App\Models\Anpol;
use App\Models\RegPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnpolController extends Controller
{
    public function tampilkanPoli()
    {
        $tanggalSekarang = now()->format('Y-m-d'); // Mengambil tanggal saat ini dalam format "YYYY-MM-DD"
        $DataRalan = RegPeriksa::select('tgl_registrasi', 'pasien.no_rkm_medis', 'pasien.nm_pasien', 'dokter.nm_dokter')
            ->join('pasien', 'pasien.no_rkm_medis', '=', 'reg_periksa.no_rkm_medis')
            ->join('dokter', 'dokter.kd_dokter', '=', 'reg_periksa.kd_dokter')
            ->where('stts', 'Belum')
            ->where('status_lanjut', 'Ralan')
            ->where('status_bayar', 'Belum Bayar')
            ->whereDate('tgl_registrasi', $tanggalSekarang) // Menggunakan whereDate untuk membandingkan hanya tanggal tanpa waktu
            ->get();
        return view('poli.index', compact('DataRalan', 'tanggalSekarang')); // Mengirimkan variabel $tanggalSekarang ke view jika diperlukan
    }

    public function RegPeriksa() //endpoint data pasien poli
    {
        // $tanggalSekarang = now()->format('Y-m-d');
        $DataRalan = RegPeriksa::select('tgl_registrasi', 'pasien.no_rkm_medis', 'pasien.nm_pasien', 'dokter.nm_dokter')
            ->join('pasien', 'pasien.no_rkm_medis', '=', 'reg_periksa.no_rkm_medis')
            ->join('dokter', 'dokter.kd_dokter', '=', 'reg_periksa.kd_dokter')
            ->where('stts', 'Belum')
            ->where('status_lanjut', 'Ralan')
            ->where('status_bayar', 'Belum Bayar')
            // ->whereDate('tgl_registrasi', $tanggalSekarang)
            ->get();
        return response()->json($DataRalan);
    }
    public function submitPasien(Request $request)
    {
        $validator = Validator::make($request->except('_token'), [
            'nm_pasien' => 'required|string|min:1',
            'dokter' => 'required|string|min:1',
            'poli' => 'required|string|min:1',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $data = new Anpol();
        $data->nm_pasien = $request->nm_pasien;
        $data->dokter = $request->dokter;
        $data->poli = $request->poli;
        // $data->save();
        dd($request);
    }
}
