<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class DataMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Matakuliah::all();
        return view('data_mahasiswa', ['matakuliah' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('data_mahasiswa_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Matakuliah::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'sks' => (int)$request->sks,
            'dosen' => $request->dosen
        ]);

        session()->flash('message_create', 'Data berhasil ditambah');
        return redirect()->route('data-mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matakuliah = Matakuliah::find((int)$id);
        return view('data_mahasiswa_show', ['matakuliah' => $matakuliah]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matakuliah = Matakuliah::find((int)$id);
        return view('data_mahasiswa_edit', ['matakuliah' => $matakuliah]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Matakuliah::where('id', (int)$id)->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'sks' => (int)$request->sks,
            'dosen' => $request->dosen
        ]);

        return redirect()->route('data-mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Matakuliah::destroy((int)$id);

        session()->flash('message_delete', 'Data berhasil dihapus');
        return redirect()->route('data-mahasiswa.index');
    }
}
