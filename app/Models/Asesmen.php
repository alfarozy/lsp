<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesmen extends Model
{
    use HasFactory;
    protected $fillable = ['asesor_id', 'jadwal_id', 'siswa_id', 'status', 'description'];

    const STATUS_Kompeten = 'Kompeten';
    const STATUS_TIDAK_Kompeten = 'Tidak Kompeten';

    public function asesor()
    {
        return $this->belongsTo(Asesor::class, 'asesor_id', 'id');
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
    public function jadwal()
    {
        return $this->belongsTo(Jadwal::class, 'jadwal_id', 'id');
    }
}
