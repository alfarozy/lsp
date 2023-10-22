<?php

namespace App\Http\Controllers;

use App\Models\Asesmen;
use App\Models\Asesor;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class AsesmenController extends Controller
{
    public function index()
    {
        if (auth('asesor')->check()) {

            $data = Jadwal::where('asesor_id', auth('asesor')->id())->whereEnabled(1)->get();
        } else {

            $data = Jadwal::whereEnabled(1)->get();
        }
        return view('backoffice.asesmen.index', compact('data'));
    }
    public function show($id)
    {
        $jadwal = Jadwal::findOrFail($id);
        // $asesor = Asesor::whereEnabled(1)->findOrFail($jadwal->asesor_id);
        $data = Siswa::whereKelasId($jadwal->kelas_id)->orderBy('nis')->get();
        $sudahDinilai = Asesmen::where(['jadwal_id' => $jadwal->id])->count();

        return view('backoffice.asesmen.show', compact('jadwal', 'data', 'sudahDinilai'));
    }


    //> edit data
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $jadwal = Jadwal::findOrFail(request()->jadwal);
        $data = Asesmen::where(['siswa_id' => $siswa->id, 'asesor_id' => $jadwal->asesor_id])->first();
        return view("backoffice.asesmen.edit", compact("data", 'jadwal', 'siswa'));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            'asesor_id'      => 'required|exists:asesors,id',
            'jadwal_id'      => 'required|exists:jadwals,id',
            'siswa_id'      => 'required|exists:siswas,id',
            'status'      => 'required',
            'description'      => 'nullable',
        ]);
        Asesmen::create($attr);
        toastr()->success("Berhasil mengupdate data", 'Berhasil');
        if (Auth('asesor')->check()) {

            return redirect()->route("asesor-asesmen.show", $attr['jadwal_id']);
        } else {
            return redirect()->route("asesmen.show", $attr['jadwal_id']);
        }
    }
    //> update data
    public function update(Request $request, $id)
    {
        $data = Asesmen::findOrFail($id);
        $attr = $request->validate([
            'asesor_id'      => 'required|exists:asesors,id',
            'jadwal_id'      => 'required|exists:jadwals,id',
            'siswa_id'      => 'required|exists:siswas,id',
            'status'      => 'required',
            'description'      => 'nullable',
        ]);
        $data->update($attr);
        toastr()->success("Berhasil mengupdate data", 'Berhasil');
        if (Auth('asesor')->check()) {

            return redirect()->route("asesor-asesmen.show", $attr['jadwal_id']);
        } else {
            return redirect()->route("asesmen.show", $attr['jadwal_id']);
        }
    }
}
