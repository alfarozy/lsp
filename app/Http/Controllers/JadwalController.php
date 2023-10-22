<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Jadwal;
use App\Models\Kelas;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function __construct()
    {
        if (Auth('siswa')->check()) {
            abort(404);
        }
    }
    public function index()
    {
        if (Auth('asesor')->check()) {
            $data = Jadwal::where('asesor_id', auth('asesor')->id())->get();
        } else {
            $data = Jadwal::get();
        }
        return view('backoffice.jadwal.index', compact('data'));
    }
    public function create()
    {
        $asesors = Asesor::whereEnabled(1)->get();
        $kelas = Kelas::whereEnabled(1)->get();
        return view('backoffice.jadwal.create', compact('asesors', 'kelas'));
    }
    public function store(Request $request)
    {

        $attr = $request->validate([
            'asesor_id'      => 'required|exists:asesors,id',
            'kelas_id'      => 'required|exists:kelas,id',
            'nama_ruangan'      => 'required',
            'tanggal'      => 'required',
            'jam'      => 'required',
        ]);

        Jadwal::create($attr);
        toastr()->success("Berhasil menambahkan data", 'Berhasil');
        if (Auth('asesor')->check()) {
            return redirect()->route("asesor-jadwal.index");
        } else {
            return redirect()->route("jadwal.index");
        }
    }

    //> edit data
    public function edit($id)
    {
        $asesors = Asesor::whereEnabled(1)->get();
        $kelas = Kelas::whereEnabled(1)->get();
        $data = Jadwal::findOrFail($id);
        return view("backoffice.jadwal.edit", compact("data", 'asesors', 'kelas'));
    }
    //> update data
    public function update(Request $request, $id)
    {
        $data = Jadwal::findOrFail($id);
        $attr = $request->validate([
            'asesor_id'      => 'required|exists:asesors,id',
            'kelas_id'      => 'required|exists:kelas,id',
            'nama_ruangan'      => 'required',
            'tanggal'      => 'required',
            'jam'      => 'required',
        ]);
        $data->update($attr);
        toastr()->success("Berhasil mengupdate data", 'Berhasil');
        if (Auth('asesor')->check()) {
            return redirect()->route("asesor-jadwal.index");
        } else {
            return redirect()->route("jadwal.index");
        }
    }
    public function setActive($id)
    {
        $data = Jadwal::findOrFail($id);
        if ($data->enabled == 1) {
            $data->update(['enabled' => 0]);
            toastr()->success("Item berhasil dinonaktifkan", "Berhasil");
        } else {
            $data->update(['enabled' => 1]);
            toastr()->success("Item berhasil diaktifkan", "Berhasil");
        }
        if (Auth('asesor')->check()) {
            return redirect()->route("asesor-jadwal.index");
        } else {
            return redirect()->route("jadwal.index");
        }
    }
}
