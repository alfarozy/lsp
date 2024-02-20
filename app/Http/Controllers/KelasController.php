<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $data = Kelas::get();
        return view('backoffice.kelas.index', compact('data'));
    }
    public function create()
    {
        $jurusan = Jurusan::whereEnabled(1)->get();
        return view('backoffice.kelas.create', compact('jurusan'));
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama_kelas'      => 'required',
            'jurusan_id' => 'required'
        ]);

        $checkClass = Kelas::where('nama_kelas', $request->nama_kelas)->first();
        if ($checkClass) {
            toastr()->error("Nama kelas sudah tersedia", 'Gagal');
            return redirect()->back();
        }

        Kelas::create($attr);
        toastr()->success("Berhasil menambahkan data", 'Berhasil');
        return redirect()->route("kelas.index");
    }

    //> edit data
    public function edit($id)
    {
        $data = Kelas::findOrFail($id);
        $jurusan = Jurusan::whereEnabled(1)->get();

        return view("backoffice.kelas.edit", compact("data", 'jurusan'));
    }
    //> update data
    public function update(Request $request, $id)
    {
        $data = Kelas::findOrFail($id);
        $attr = $request->validate([
            'nama_kelas'      => 'required',
            'jurusan_id' => 'required'
        ]);
        $data->update($attr);
        toastr()->success("Berhasil mengupdate data", 'Berhasil');
        return redirect()->route("kelas.index");
    }
    public function setActive($id)
    {
        $data = Kelas::findOrFail($id);
        if ($data->enabled == 1) {
            $data->update(['enabled' => 0]);
            toastr()->success("Item berhasil dinonaktifkan", "Berhasil");
            return redirect()->route('kelas.index');
        } else {
            $data->update(['enabled' => 1]);
            toastr()->success("Item berhasil diaktifkan", "Berhasil");
            return redirect()->route('kelas.index');
        }
    }
}
