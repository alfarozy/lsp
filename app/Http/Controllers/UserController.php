<?php

namespace App\Http\Controllers;

use App\Exports\EmployesExport;
use App\Imports\EmployesImport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        if (request()->start || request()->end || request()->status || request()->name) {
            $users = User::where('name', 'like', '%' . request()->name . '%')->whereBetween('created_at', [request()->start, request()->end])->where('enabled', request()->status)->get();
        } else {
            $users = User::get();
        }
        return view('backoffice.users.index', compact('users'));
    }

    public function create()
    {
        return view('backoffice.users.create');
    }

    public function store(Request $request)
    {
        $attr = $request->validate([
            'name' => 'required',
            'email'     => 'required|unique:users',
            'password'  => 'required|min:3',
        ], [
            '*.required' => 'Bidang ini wajib'
        ]);

        $attr['password'] = bcrypt($attr['password']);

        User::create($attr);

        return redirect()->route('users.index')->with('msg', 'Berhasil menambah data pengguna');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('backoffice.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $attr = $request->validate([
            'name' => 'required',
            'email'     => 'required|unique:users',
            'email'     => ['required', Rule::unique('users', 'email')->ignore($id)],
        ], [
            '*.required' => 'Bidang ini wajib'
        ]);
        if ($request->password) {
            $attr['password'] = bcrypt($request->password);
        }
        $user = User::findOrFail($id);

        $user->update($attr);
        return redirect()->route('users.index')->with('msg', 'Berhasil memperbarui data pengguna');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('backoffice.users.show', compact('user'));
    }

    public function setActive($id)
    {
        $user = User::findOrFail($id);
        if ($user->enabled == 1) {
            $user->update(['enabled' => 0]);
            return redirect()->route('users.index')->with('msg', 'Pegawai berhasil dinonaktifkan');
        } else {
            $user->update(['enabled' => 1]);
            return redirect()->route('employes.index')->with('msg', 'Pegawai berhasil diaktifkan');
        }
    }

    public function import(Request $request)
    {
        $file = $request->file('file')->store('import');
        try {
            Excel::import(new EmployesImport, $file);
            Storage::delete($file);
            return redirect()->route('users.index')->with('msg', 'Data pengguna berhasil diimport');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('users.index')->with('error', 'Terjadi kesalahan mohon gunakan template excel yang kami sediakan');
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
            $user = User::where('nama_pegawai', 'like', '%' . request()->nama_pegawai . '%')->whereBetween('created_at', [request()->start, request()->end])->where('enabled', request()->status)->get();
        } else {
            $user = User::get();
        }
        return Excel::download(new EmployesExport($user), time() . '-Data-Pegawai.xlsx');
    }
}
