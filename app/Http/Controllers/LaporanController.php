<?php

namespace App\Http\Controllers;

use App\Exports\AsesmenExport;
use App\Models\Asesmen;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        $data = Asesmen::when(request()->status, function ($query) {
            return $query->where('status', request()->status);
        })
            ->when(request()->kelas_id, function ($query) {
                return $query->whereHas('siswa', function ($q) {
                    $q->where('kelas_id', request()->kelas_id);
                });
            })
            ->get();

        $kelas = Kelas::where('enabled', 1)->get();
        return view('backoffice.laporan.index', compact('data', 'kelas'));
    }
    public function asesmen()
    {
        return view('backoffice.laporan.asesmen');
    }
    public function export()
    {
        $asesmen = Asesmen::with(['siswa'])->when(request()->status, function ($query) {
            return $query->where('status', request()->status);
        })
            ->when(request()->kelas_id, function ($query) {
                return $query->whereHas('siswa', function ($q) {
                    $q->where('kelas_id', request()->kelas_id);
                });
            })
            ->get()->map(function ($item) {

                return (object) [
                    'nama' => $item->siswa->nama,
                    'nis' => $item->siswa->nis,
                    'kelas' => $item->siswa->kelas->nama_kelas,
                    'status' => $item->status,
                    'jadwal' => $item->jadwal->tanggal . " Jam " . $item->jadwal->jam,
                    'note' => $item->description
                ];
            });
        return Excel::download(new AsesmenExport($asesmen), time() . '-Data-asesmen.xlsx');
    }
}
