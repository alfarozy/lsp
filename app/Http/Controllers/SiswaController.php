<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = Siswa::get();
        return view('backoffice.siswa.index', compact('data'));
    }
    public function create()
    {
        $kelas = Kelas::whereEnabled(1)->get();
        return view('backoffice.siswa.create', compact('kelas'));
    }
    public function store(Request $request)
    {

        $attr = $request->validate([
            'nama' => 'string|required',
            'nomor_telepon' => 'string|required',
            'password' => 'string|required',
            'nis' => 'required|string|unique:siswas',
            'kelas_id' => 'required|exists:kelas,id',
            'tanggal_lahir' => 'date|required',
            'tempat_lahir' => 'string|required',
            'jenis_kelamin' => 'in:L,P|required',
            'alamat' => 'string|required',
        ]);
        $attr['enabled'] = 1;
        $attr['password'] = bcrypt($request->password);
        Siswa::create($attr);
        toastr()->success("Berhasil menambahkan data", 'Berhasil');
        if (auth('asesor')->check()) {
            return redirect()->route('asesor-siswa.index');
        } else {
            return redirect()->route('siswa.index');
        }
    }

    public function show($id)
    {
        $data = Siswa::findOrFail($id);
        $jadwal = Jadwal::whereEnabled(1)->where('kelas_id', $data->kelas_id)->get();
        return view("backoffice.siswa.show", compact("data", "jadwal"));
    }
    public function edit($id)
    {
        $kelas = Kelas::whereEnabled(1)->get();
        $data = Siswa::findOrFail($id);
        return view("backoffice.siswa.edit", compact("data", 'kelas'));
    }
    //> update data
    public function update(Request $request, $id)
    {
        $data = Siswa::findOrFail($id);
        $attr = $request->validate([
            'nama' => 'string|required',
            'nomor_telepon' => 'string|required',
            'password' => 'string|nullable',
            'nis' => 'required|string|unique:siswas,nis,' . $data->id,
            'kelas_id' => 'required|exists:kelas,id',
            'tanggal_lahir' => 'date|required',
            'tempat_lahir' => 'string|required',
            'jenis_kelamin' => 'in:L,P|required',
            'alamat' => 'string|required',
        ]);
        unset($attr['password']);
        if ($request->password) {
            $attr['password'] = bcrypt($request->password);
        }
        $data->update($attr);
        toastr()->success("Berhasil mengupdate data", 'Berhasil');
        if (auth('asesor')->check()) {
            return redirect()->route('asesor-siswa.index');
        } else {
            return redirect()->route('siswa.index');
        }
    }
    public function setActive($id)
    {
        $data = Siswa::findOrFail($id);
        if ($data->enabled == 1) {
            $data->update(['enabled' => 0]);
            toastr()->success("Item berhasil dinonaktifkan", "Berhasil");
        } else {
            $data->update(['enabled' => 1]);
            toastr()->success("Item berhasil diaktifkan", "Berhasil");
        }
        if (auth('asesor')->check()) {
            return redirect()->route('asesor-siswa.index');
        } else {
            return redirect()->route('siswa.index');
        }
    }
}
