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
        return view('siswa.profile', compact('data', 'kelas'));
    }
    public function profileUpdate(Request $request)
    {
        $data = Siswa::findOrFail(Auth('siswa')->id());

        $attr = $request->validate([
            'nama' => 'string|required',
            'nomor_telepon' => 'string|required',
            'email' => 'required|string|unique:siswas,email,' . $data->id,
            'nis' => 'required|string|unique:siswas,nis,' . $data->id,
            'kelas_id' => 'required|exists:kelas,id',
            'tanggal_lahir' => 'date|required',
            'tempat_lahir' => 'string|required',
            'jenis_kelamin' => 'in:L,P|required',
            'alamat' => 'string|required',
            'file_rapor' => 'nullable|mimes:pdf|max:5048', // Max size: 2MB
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:3048', // Max size: 2MB
        ]);

        // Unset password attribute
        unset($attr['password']);

        // Handle password update
        if ($request->password) {
            $attr['password'] = bcrypt($request->password);
        }

        // Handle file_rapor upload
        if ($request->file_rapor) {
            $attr['file_rapor'] = $request->file_rapor->store('rapor');
        }

        // Handle foto upload
        if ($request->foto) {
            $attr['foto'] = $request->foto->store('foto');
        }

        // Update data
        $data->update($attr);

        // Set success message
        toastr()->success("Berhasil mengupdate data", 'Berhasil');

        return redirect()->back();
    }
}
