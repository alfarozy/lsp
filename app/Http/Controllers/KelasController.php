<?php

namespace App\Http\Controllers;

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
        return view('backoffice.kelas.create');
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama_kelas'      => 'required',
        ]);

        Kelas::create($attr);
        toastr()->success("Berhasil menambahkan data", 'Berhasil');
        return redirect()->route("kelas.index");
    }

    //> edit data
    public function edit($id)
    {
        $data = Kelas::findOrFail($id);
        return view("backoffice.kelas.edit", compact("data"));
    }
    //> update data
    public function update(Request $request, $id)
    {
        $data = Kelas::findOrFail($id);
        $attr = $request->validate([
            'nama_kelas'      => 'required',
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
