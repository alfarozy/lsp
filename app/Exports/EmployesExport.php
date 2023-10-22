<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EmployesExport implements WithMapping, WithHeadings, ShouldAutoSize, FromView
{
    private $employes;

    public function __construct($employes)
    {
        $this->employes = $employes;
    }
    public function view(): View
    {
        return view('backoffice.admin.pegawai.export', ['employes' => $this->employes]);
    }


    public function headings(): array
    {
        return [
            'Nama pegawai',
            'Jabatan Pegawai',
            'Email',
            'Nama Atasan',
            'Jabatan Atasan'
        ];
    }

    public function map($row): array
    {

        return [
            $row->nama_pegawai,
            $row->jabatan_pegawai,
            $row->email,
            $row->nama_atasan,
            $row->jabatan_atasan,
        ];
    }
}
