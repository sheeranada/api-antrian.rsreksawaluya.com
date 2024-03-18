<?php

namespace App\Http\Controllers;

use App\Models\Anlok;
use App\Models\Antrianadmisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AnlokController extends Controller
{
    public function lastTicket()
    {
        $lasTicket = Anlok::select('nomor') //nomor terakhir yang diambil dari security
            ->orderBy('tanggal', 'Desc')
            ->orderBy('jam', 'DESC')
            ->first();
        return response()->json($lasTicket);
    }
    public function antrianAdmisi(Request $request) //post data yang akan dilayani
    {
        $validator = Validator::make($request->except('_token'), [
            'loket_nomor' => 'required|numeric|min:1',
            'antrian_nomor' => 'required|numeric|min:1'
        ]);
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }
        $data = new Antrianadmisi(); //post data
        $data->loket_nomor = $request->loket_nomor;
        $data->antrian_nomor = $request->antrian_nomor;
        $data->save();
        return response()->json('post data berhasil');
    }
    public function nomorDilayani()
    {
        $nomorDilayani = Antrianadmisi::orderBy('created_at', 'DESC')->first();
        return response()->json($nomorDilayani);
    }
}
