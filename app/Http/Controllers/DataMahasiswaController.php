<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse
    {
        if (Auth::check()) {
            $data = [
                'nim' => '200170120',
                'nama' => 'Hawari Muflih Munte',
                'prodi' => 'Teknik Informatika',
                'jurusan' => 'Teknik Informatika'
            ];
            $db = Matakuliah::all();

            return view('pages.data_mahasiswa', [
                'data_mahasiswa' => $data,
                'matakuliah' => $db
            ]);
        }

        return redirect()->route('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|RedirectResponse
    {
        if (Auth::check()) {
            return view('pages.data_mahasiswa_create');
        }

        return redirect()->route('login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if (Auth::check()) {
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

        return redirect()->route('login');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): View|RedirectResponse
    {
        if (Auth::check()) {
            $matakuliah = Matakuliah::find((int)$id);

            if ($matakuliah->exists()) {
                session()->flash('message_show_success', 'Data berhasil ditemukan');
            } else {
                session()->flash('message_show_failed', 'Data gagal ditemukan. Terjadi kesalahan!');
            }

            return view('pages.data_mahasiswa_show', ['matakuliah' => $matakuliah]);
        }

        return redirect()->route('login');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View|RedirectResponse
    {
        if (Auth::check()) {
            $matakuliah = Matakuliah::find((int)$id);

            if ($matakuliah->exists()) {
                session()->flash('message_edit_success', 'Data berhasil ditemukan');
            } else {
                session()->flash('message_edit_failed', 'Data gagal ditemukan. Terjadi kesalahan!');
            }

            return view('pages.data_mahasiswa_edit', ['matakuliah' => $matakuliah]);
        }

        return redirect()->route('login');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        if (Auth::check()) {
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

        return redirect()->route('login');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        if (Auth::check()) {
            $rowsAffected = Matakuliah::destroy((int)$id);

            if ($rowsAffected > 0) {
                session()->flash('message_delete_success', 'Data berhasil dihapus');
            } else {
                session()->flash('message_delete_failed', 'Data gagal dihapus');
            }

            return redirect()->route('data-mahasiswa.index');
        }

        return redirect()->route('login');
    }
}
