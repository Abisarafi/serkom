<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class AdminController extends Controller
{
    // fungsi untuk menampilkan data mahasiswa yang terdapat dalam database
    public function index()
    {
        $mahasiswas = Mahasiswa::orderBy('nim', 'desc')->get();

        return view('admin.index', ['mahasiswas' => $mahasiswas]);
    }

    // fungsi untuk ke halaman tambah data
    public function create()
    {
        return view('admin.create');
        
    }

    // fungsi untuk menambahkan data ke dalam database
    public function store(Request $request)
    {
        // memvalidasi tiap inputan
        $request->validate([
            'nim' => 'required|unique:mahasiswas',
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|in:L,P',
            'usia' => 'required|integer',
        ]);

        // memanggil model mahasiswa dan mengrequest 
        Mahasiswa::create($request->all());
        return redirect()->route('admin.index')->with('success', 'Mahasiswa berhasil ditambahkan');
    }

    // fungsi untuk ke halaman edit
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('admin.edit', ['mahasiswa' => $mahasiswa]);
    }

    // fungsi untuk memperbarui data
    public function update(Request $request, $id)
    {
        // validasi data
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required|date',
            'gender' => 'required|in:L,P',
            'usia' => 'required|integer',
        ]);
        
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->update($request->all());
        return redirect()->route('admin.index')->with('success', 'Mahasiswa berhasil diperbarui');
    }

    // fungsi untuk menghapus data
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->delete();
        return redirect()->route('admin.index')->with('success', 'Mahasiswa berhasil dihapus');
    }
}
