<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->jenkel = ['L' => 'Laki-laki', 'P' => 'Perempuan'];
        $this->folderfoto = public_path('upload/fotomahasiswa/');
    }

    public function index()
    {
        $jenkel = $this->jenkel;
        $mahasiswa = Mahasiswa::all();
        $title = "Data Keseluruhan Mahasiswa";
        return view('mahasiswa.index', compact('jenkel', 'mahasiswa', 'title'));
    }

    public function create()
    {
        $title = 'Form Tambah Mahasiswa';
        $jenkel = $this->jenkel;
        return view('mahasiswa.create', compact('title', 'jenkel'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jenkel' => 'required',
        ]);

        $mahasiswa = new Mahasiswa();
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->jenkel = $request->jenkel;

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $nowTimestamp = now()->timestamp;
            $filename = "{$nowTimestamp}-{$file->getClientOriginalName()}";
            $file->move($this->folderfoto, $filename);
            $mahasiswa->foto = $filename;
        }

        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Data Mahasiswa Berhasil Disimpan');
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $title = "Data Mahasiswa NIM " . $mahasiswa->nim;
        $jenkel = $this->jenkel;
        return view('mahasiswa.show', compact('title', 'mahasiswa', 'jenkel'));
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $jenkel = $this->jenkel;
        $title = "Form Edit Data";
        return view('mahasiswa.edit', compact('title', 'mahasiswa', 'jenkel'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jenkel' => 'required',
        ]);

        if ($request->file('foto')) {
            $file = $request->file('foto');
            $nowTimestamp = now()->timestamp;
            $filename = "{$nowTimestamp}-{$file->getClientOriginalName()}";
            $file->move($this->folderfoto, $filename);
            $mahasiswa->foto = $filename;
        }

        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->jenkel = $request->jenkel;
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Berhasil mengubah data');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Berhasil menghapus data');
    }
}
