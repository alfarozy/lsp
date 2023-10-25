<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;

class AsesmenExport implements WithMapping, WithHeadings, ShouldAutoSize, FromView
{

    private $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    public function view(): View
    {
        return view('backoffice.laporan.export', ['data' => $this->data]);
    }


    public function headings(): array
    {
        return [
            'Nama Siswa',
            'NIS',
            'Kelas',
            'Status',
            'Jadwal',
            "Keterangan"
        ];
    }

    public function map($row): array
    {

        return [
            $row->nama,
            $row->nis,
            $row->kelas,
            $row->status,
            $row->jadwal,
            $row->note,
        ];
    }
}
