<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Asesor;
use App\Models\Employes;
use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        if ($request->email && $request->password) {

            $user = User::whereEmail($request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->enabled == 1) {

                    Auth::guard()->login($user);

                    return redirect()->route('dashboard');
                } else {
                    return redirect()->route('admin.login')->with('msg', '<b>Login gagal</b>,Akun belum aktif atau sementara dinonaktifkan oleh admin');
                }
            } else {
                return redirect()->route('admin.login')->with('msg', '<b>Login gagal</b>,email atau password salah');
            }
        } else {
            return redirect()->route('admin.login')->with('msg', 'Email dan password wajib');
        }
    }
    public function indexRegisterSiswa()
    {
        $kelas = Kelas::where('enabled', 1)->get();
        return view('auth.register-siswa', compact('kelas'));
    }
    public function registerSiswa(Request $request)
    {

        $this->validate($request, [
            'nama' => 'required|string',
            'nis' => [
                'required',
                'string',
                Rule::unique('siswas', 'nis'),
            ],
            'nomor_telepon' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'password' => 'required|string',
            'kelas_id' => 'required|integer',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'alamat' => 'required|string',
        ], [
            '*.required' => 'Wajib diisi',
            'nis.unique' => 'NISN Sudah terdaftar'
        ]);

        // Simpan data pendaftaran ke dalam database
        Siswa::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'nomor_telepon' => $request->nomor_telepon,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => bcrypt($request->password),
            'kelas_id' => $request->kelas_id,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'alamat' => $request->alamat,
            'enabled' => 1
        ]);
        return redirect()->route('siswa.login')->with('success', 'Pendaftaran berhasil, Silahkan login ');
    }
    public function indexSiswa()
    {
        return view('auth.login-siswa');
    }

    public function loginSiswa(Request $request)
    {

        if ($request->nis && $request->password) {

            $user = Siswa::whereNis($request->nis)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->enabled == 1) {

                    Auth::guard('siswa')->login($user);

                    return redirect()->route('siswa.dashboard');
                } else {
                    return redirect()->route('siswa.login')->with('msg', '<b>Login gagal</b>,Akun belum aktif atau sementara dinonaktifkan oleh admin');
                }
            } else {
                return redirect()->route('siswa.login')->with('msg', '<b>Login gagal</b>,NISN atau password salah');
            }
        } else {
            return redirect()->route('siswa.login')->with('msg', 'NISN dan password wajib');
        }
    }
    public function indexAsesor()
    {
        return view('auth.login-asesor');
    }

    public function loginAsesor(Request $request)
    {

        if ($request->email && $request->password) {

            $user = Asesor::whereEmail($request->email)->first();
            if ($user && Hash::check($request->password, $user->password)) {
                if ($user->enabled == 1) {

                    Auth::guard('asesor')->login($user);

                    return redirect()->route('asesor.dashboard');
                } else {
                    return redirect()->route('asesor.login')->with('msg', '<b>Login gagal</b>,Akun belum aktif atau sementara dinonaktifkan oleh admin');
                }
            } else {
                return redirect()->route('asesor.login')->with('msg', '<b>Login gagal</b>,email atau password salah');
            }
        } else {
            return redirect()->route('asesor.login')->with('msg', 'Email dan password wajib');
        }
    }
}
