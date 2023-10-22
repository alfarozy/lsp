<?php

namespace App\Imports;

use App\Models\Employes;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class EmployesImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use SkipsErrors, SkipsFailures;
    public function model(array $row)
    {
        return new Employes([
            'nama_pegawai' => $row['nama_pegawai'],
            'jabatan_pegawai' => $row['jabatan_pegawai'] ?? 'HSE Officer',
            'nama_atasan' => $row['nama_atasan'],
            'jabatan_atasan' => $row['jabatan_atasan'] ?? 'Direktur Utama',
            'email' => $row['email'],
            'password' => bcrypt('password321'),
            'cabang_lokasi' => $row['cabang_lokasi'] ?? 'Head Office',
            'div' => $row['div'] ?? 'HSE',
            'enabled' => 1,
        ]);
    }

    public function rules(): array
    {
        return [
            '*.email' => 'email|unique:employes',
        ];
    }
    public function onFailure(Failure ...$failures)
    {
        // Handle the failures how you'd like.
    }
}
