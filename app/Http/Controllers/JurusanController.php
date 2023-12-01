<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $data = Jurusan::get();
        return view('backoffice.jurusan.index', compact('data'));
    }
    public function create()
    {
        return view('backoffice.jurusan.create');
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama'      => 'required',
        ]);

        Jurusan::create($attr);
        return redirect()->route("jurusan.index")
            ->with("msg", "Berhasil menambahkan data");
    }

    //> edit data
    public function edit($id)
    {
        $data = Jurusan::findOrFail($id);
        return view("backoffice.jurusan.edit", compact("data"));
    }
    //> update data
    public function update(Request $request, $id)
    {
        $data = Jurusan::findOrFail($id);
        $attr = $request->validate([
            'nama'      => 'required',
        ]);
        $data->update($attr);
        return redirect()->route("jurusan.index")
            ->with("msg", "Berhasil mengupdate data");
    }
    public function setActive($id)
    {
        $data = Jurusan::findOrFail($id);
        if ($data->enabled == 1) {
            $data->update(['enabled' => 0]);
            return redirect()->route('jurusan.index')
                ->with("Item berhasil dinonaktifkan", "Berhasil");
        } else {
            $data->update(['enabled' => 1]);
            return redirect()->route('jurusan.index')
                ->with("Item berhasil diaktifkan", "Berhasil");
        }
    }
}
