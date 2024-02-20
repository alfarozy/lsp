<?php

namespace App\Http\Controllers;

use App\Models\Asesmen;
use App\Models\Asesor;
use App\Models\Jadwal;
use App\Models\Siswa;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'siswa' => Siswa::whereEnabled(1)->count(),
            'asesor' => Asesor::whereEnabled(1)->count(),
            'jadwal' => Jadwal::whereEnabled(1)->count(),
            'asesmen' => Asesmen::whereStatus('Kompeten')->count()
        ];
        return view("frontoffice.index", $data);
    }
    public function profile()
    {
        return view("frontoffice.profile");
    }
}
