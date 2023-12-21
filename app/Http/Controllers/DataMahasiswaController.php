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
        $data = [
            'nim' => '200170120',
            'nama' => 'Hawari Muflih Munte',
            'prodi' => 'Teknik Informatika',
            'jurusan' => 'Teknik Informatika'
        ];
        $db = Matakuliah::all();

        return view('data_mahasiswa', [
            'data_mahasiswa' => $data,
            'matakuliah' => $db
        ]);
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
        $matakuliah = Matakuliah::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'sks' => (int)$request->sks,
            'kelas' => $request->kelas,
            'dosen' => $request->dosen
        ]);

        if ($matakuliah->exists()) {
            session()->flash('message_create_success', 'Data berhasil ditambah');
        } else {
            session()->flash('message_create_failed', 'Data gagal ditambah. Terjadi kesalahan!');
        }

        return redirect()->route('data-mahasiswa.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matakuliah = Matakuliah::find((int)$id);

        if ($matakuliah->exists()) {
            session()->flash('message_show_success', 'Data berhasil ditemukan');
        } else {
            session()->flash('message_show_failed', 'Data gagal ditemukan. Terjadi kesalahan!');
        }

        return view('data_mahasiswa_show', ['matakuliah' => $matakuliah]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matakuliah = Matakuliah::find((int)$id);

        if ($matakuliah->exists()) {
            session()->flash('message_edit_success', 'Data berhasil ditemukan');
        } else {
            session()->flash('message_edit_failed', 'Data gagal ditemukan. Terjadi kesalahan!');
        }

        return view('data_mahasiswa_edit', ['matakuliah' => $matakuliah]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matakuliah = Matakuliah::find((int)$id);

        $matakuliah->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'sks' => (int)$request->sks,
            'kelas' => $request->kelas,
            'dosen' => $request->dosen
        ]);

        if ($matakuliah->exists()) {
            session()->flash('message_update_success', 'Data berhasil diubah');
        } else {
            session()->flash('message_update_failed', 'Data gagal diubah');
        }

        return redirect()->route('data-mahasiswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $rowsAffected = Matakuliah::destroy((int)$id);

        if ($rowsAffected > 0) {
            session()->flash('message_delete_success', 'Data berhasil dihapus');
        } else {
            session()->flash('message_delete_failed', 'Data gagal dihapus');
        }

        return redirect()->route('data-mahasiswa.index');
    }
}
