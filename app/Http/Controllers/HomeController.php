<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class HomeController extends Controller
{
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('nim', 'desc')->get();
        $total_mahasiswa = Mahasiswa::count();
        $statistik_gender = Mahasiswa::select('gender', \DB::raw('count(*) as total'))
                                    ->groupBy('gender')
                                    ->get();

        return view('index', [
            'mahasiswas' => $mahasiswas,
            'total_mahasiswa' => $total_mahasiswa,
            'statistik_gender' => $statistik_gender
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->get('keyword');
        $mahasiswas = Mahasiswa::where('nama', 'like', "%$keyword%")->orderBy('nim', 'desc')->get();
        $total_mahasiswa = Mahasiswa::count();
        $statistik_gender = Mahasiswa::select('gender', \DB::raw('count(*) as total'))
                                    ->groupBy('gender')
                                    ->get();

        return view('index', [
            'mahasiswas' => $mahasiswas,
            'total_mahasiswa' => $total_mahasiswa,
            'statistik_gender' => $statistik_gender,
            'keyword' => $keyword
        ]);
    }
}
