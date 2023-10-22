<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;

class AsesorController extends Controller
{
    public function index()
    {
        $data = Asesor::get();
        return view('backoffice.asesor.index', compact('data'));
    }
    public function create()
    {
        return view('backoffice.asesor.create');
    }
    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama'      => 'required',
            'email'      => 'required|email|unique:asesors',
            'password'      => 'required',
            'nip'      => 'required',
        ]);

        $attr['password'] = bcrypt($request->password);
        Asesor::create($attr);
        toastr()->success("Berhasil menambahkan data", 'Berhasil');
        return redirect()->route("asesor.index");
    }

    //> edit data
    public function edit($id)
    {
        $data = Asesor::findOrFail($id);
        return view("backoffice.asesor.edit", compact("data"));
    }
    //> update data
    public function update(Request $request, $id)
    {
        $data = Asesor::findOrFail($id);
        $attr = $request->validate([
            'nama'      => 'required',
            'email'      => 'required|email|unique:asesors,email,' . $id,
            'password'      => 'nullable|sometimes',
            'nip'      => 'required',
        ]);
        unset($attr['password']);
        if ($request->password) {
            $attr['password'] = bcrypt($request->password);
        }
        $data->update($attr);
        toastr()->success("Berhasil mengupdate data", 'Berhasil');
        return redirect()->route("asesor.index");
    }
    public function setActive($id)
    {
        $data = Asesor::findOrFail($id);
        if ($data->enabled == 1) {
            $data->update(['enabled' => 0]);
            toastr()->success("Item berhasil dinonaktifkan", "Berhasil");
            return redirect()->route('asesor.index');
        } else {
            $data->update(['enabled' => 1]);
            toastr()->success("Item berhasil diaktifkan", "Berhasil");
            return redirect()->route('asesor.index');
        }
    }
}
