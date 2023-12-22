@extends('layouts.app')
@section('page-title', 'Data Mahasiswa | Tambah')
@section('content')
  <main class="uk-container">
    <section class="uk-padding-large">
      <h1>Data Mahasiswa | Data Baru</h1>
      <hr>
      <section class="uk-overflow-auto">
        <section class="uk-flex uk-flex-middle">
          <a href="{{ route('data-mahasiswa.index') }}" class="uk-icon-button uk-button-primary" uk-icon="chevron-left"></a>
          <p class="uk-padding-remove uk-margin uk-margin-remove-top uk-margin-left uk-margin-remove-bottom uk-margin-remove-right">Kembali</p>
        </section>
      </section>
      <hr>
      <form action="{{ route('data-mahasiswa.store') }}" method="POST" autocomplete="off">
        @csrf
        <table class="uk-table uk-table-small uk-table-striped uk-table-hover uk-table-middle uk-table-center">
          <caption>Data matakuliah</caption>
          <thead>
            <tr>
              <th>Kode Matakuliah</th>
              <th>Nama Matakuliah</th>
              <th>Jumlah SKS</th>
              <th>Kelas</th>
              <th>Dosen Pengampu</th>
            </tr>
          </thead>
          <tbody>
              <tr>
                <td>
                  <input type="text" name="kode" id="kode" class="uk-input" autofocus>
                </td>
                <td>
                  <input type="text" name="nama" id="nama" class="uk-input">
                </td>
                <td>
                  <input type="number" name="sks" id="sks" class="uk-input" min="1" max="10">
                </td>
                <td>
                  <input type="text" name="kelas" id="kelas" class="uk-input">
                </td>
                <td>
                  <input type="text" name="dosen" id="dosen" class="uk-input" style="resize: vertical">
                </td>
                <td>
                  <button type="submit" class="uk-icon-button uk-button-primary" uk-icon="check"></button>
                </td>
              </tr>
          </tbody>
        </table>
      </form>
    </section>
  </main>
@endsection

