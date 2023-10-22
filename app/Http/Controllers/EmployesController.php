<?php

namespace App\Http\Controllers;

use App\Exports\EmployesExport;
use App\Imports\EmployesImport;
use App\Models\Employes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class EmployesController extends Controller
{
    public function index()
    {

        if (request()->start || request()->end || request()->status || request()->nama_pegawai) {
            $employes = Employes::where('nama_pegawai', 'like', '%' . request()->nama_pegawai . '%')->whereBetween('created_at', [request()->start, request()->end])->where('enabled', request()->status)->get();
        } else {
            $employes = Employes::get();
        }
        return view('backoffice.admin.pegawai.index', compact('employes'));
    }
    public function create()
    {
        return view('backoffice.admin.pegawai.create');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama_atasan' => 'required',
            'jabatan_atasan' => 'required',
            'nama_pegawai'  => 'required',
            'jabatan_pegawai'   => 'required',
            'email'     => 'required|unique:employes',
            'password'  => 'required|min:3',
            'cabang_lokasi' => 'required',
            'div'       => 'required'
        ], [
            '*.required' => 'Bidang ini wajib'
        ]);

        $attr['password'] = bcrypt($attr['password']);

        Employes::create($attr);

        return redirect()->route('employes.index')->with('msg', 'Berhasil menambah data pegawai');
    }

    public function edit($id)
    {
        $employe = Employes::findOrFail($id);
        return view('backoffice.admin.pegawai.edit', compact('employe'));
    }
    public function update(Request $request, $id)
    {
        $attr = $request->validate([
            'nama_atasan' => 'required',
            'jabatan_atasan' => 'required',
            'nama_pegawai'  => 'required',
            'jabatan_pegawai'   => 'required',
            'email'     => ['required', Rule::unique('employes', 'email')->ignore($id)],
            'cabang_lokasi' => 'required',
            'div'       => 'required'
        ], [
            '*.required' => 'Bidang ini wajib'
        ]);
        if ($request->password) {
            $attr['password'] = bcrypt($request->password);
        }
        $employe = Employes::findOrFail($id);

        $employe->update($attr);
        return redirect()->route('employes.index')->with('msg', 'Berhasil memperbarui data pegawai');
    }

    public function show($id)
    {
        $employe = Employes::findOrFail($id);
        return view('backoffice.admin.pegawai.show', compact('employe'));
    }

    public function setActive($id)
    {
        $employe = Employes::findOrFail($id);
        if ($employe->enabled == 1) {
            $employe->update(['enabled' => 0]);
            return redirect()->route('employes.index')->with('msg', 'Pegawai berhasil dinonaktifkan');
        } else {
            $employe->update(['enabled' => 1]);
            return redirect()->route('employes.index')->with('msg', 'Pegawai berhasil diaktifkan');
        }
    }

    public function import(Request $request)
    {
        $file = $request->file('file')->store('import');
        try {
            Excel::import(new EmployesImport, $file);
            Storage::delete($file);
            return redirect()->route('employes.index')->with('msg', 'Data pegawai berhasil diimport');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('employes.index')->with('error', 'Terjadi kesalahan mohon gunakan template excel yang kami sediakan');
        }
    }

    public function download()
    {
        $file = public_path() . "/import/format-data-pegawai.xlsx";
        return Response()->download($file, 'format-data-pegawai.xlsx', [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'inline; filename="format-data-pegawai.xlsx"'
        ]);
    }

    public function export()
    {
        if (request()->start || request()->end || request()->status || request()->nama_pegawai) {
            $employes = Employes::where('nama_pegawai', 'like', '%' . request()->nama_pegawai . '%')->whereBetween('created_at', [request()->start, request()->end])->where('enabled', request()->status)->get();
        } else {
            $employes = Employes::get();
        }
        return Excel::download(new EmployesExport($employes), time() . '-Data-Pegawai.xlsx');
    }
}
