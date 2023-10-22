<?php

namespace App\Http\Controllers;

use App\Models\Asesmen;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardSiswaController extends Controller
{
    public function index()
    {
        return view('backoffice.index-siswa');
    }

    public function jadwal()
    {
        $data = Jadwal::whereEnabled(1)->where('kelas_id', Auth('siswa')->user()->kelas_id)->get();
        return view('siswa.jadwal', compact('data'));
    }
    public function asesmen()
    {
        $data = Jadwal::whereEnabled(1)->where('kelas_id', Auth('siswa')->user()->kelas_id)->get();
        return view('siswa.asesmen', compact('data'));
    }

    public function profile()
    {
        $data = auth('siswa')->user();
        $kelas = Kelas::whereEnabled(1)->get();
        $jurusan = Siswa::getAllJurusan();
        return view('siswa.profile', compact('data', 'kelas', 'jurusan'));
    }
    public function profileUpdate(Request $request)
    {
        $data = Siswa::findOrFail(Auth('siswa')->id());
        $attr = $request->validate([
            'nama' => 'string|required',
            'nomor_telepon' => 'string|required',
            'password' => 'string|nullable',
            'nis' => 'required|string|unique:siswas,nis,' . $data->id,
            'kelas_id' => 'required|exists:kelas,id',
            'jurusan' => 'required',
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
        return redirect()->back();
    }
}
