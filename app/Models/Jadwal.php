<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $fillable = ['asesor_id', 'kelas_id', 'tanggal', 'nama_ruangan', 'jam', 'enabled'];

    public function getJamAttribute($value)
    {
        // Ubah format jam dari "HH:MM:SS" menjadi "HH:MM"
        return substr($value, 0, 5) . " WIB";
    }
    public function asesor()
    {
        return $this->belongsTo(Asesor::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
