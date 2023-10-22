<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    use HasFactory;
    protected $fillable = ['kelas_id', 'nis', 'password', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'nomor_telepon', 'alamat', 'jurusan', 'enabled'];

    public  function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', "id");
    }

    public function getJenisKelamin()
    {
        return $this->jenis_kelamin == "P" ? "Perempuan" : "Laki-Laki";
    }

    public static function getAllJurusan()
    {
        return [
            "Teknik Komputer dan jaringan",
            "Teknik dan Bisnis Sepeda Motor",
            "Akuntansi dan Keuangan Lembaga",
            "Otomatisasi dan Tata Kelola Perkantoran",
            "Bisnis Daring dan Pemasaran",
            "Disain Komunikasi Visual"
        ];
    }
}
