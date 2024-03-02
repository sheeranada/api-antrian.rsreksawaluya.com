<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegPeriksa extends Model
{
    use HasFactory;
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql2';
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'reg_periksa';

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'no_rkm_medis');
    }
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'kd_dokter');
    }
    public function poliklinik()
    {
        return $this->belongsTo(Poliklinik::class, 'kd_poli');
    }
}
