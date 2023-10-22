<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employes extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['nama_pegawai', 'jabatan_pegawai', 'email', 'password', 'nama_atasan', 'jabatan_atasan', 'cabang_lokasi', 'div', 'enabled'];

    public function evaluations()
    {
        return $this->belongsToMany(EmployesEvaluation::class, 'id', 'id_employe_evaluator');
    }
}
