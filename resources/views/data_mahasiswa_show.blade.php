@extends('layouts.app')
@section('page-title', 'Data Mahasiswa | Rincian Data')
@section('content')
  @if(session()->has('message_show_success'))
  <div class="uk-alert-success" uk-alert="duration: 1000" id="notif">
      <a href class="uk-alert-close" uk-close></a>
      <p>{{ session()->get('message_show_success') }}</p>
  </div>
  @elseif (session()->has('message_show_failed'))
  <div class="uk-alert-danger" uk-alert="duration: 1000" id="notif">
      <a href class="uk-alert-close" uk-close></a>
      <p>{{ session()->get('message_show_failed') }}</p>
  </div>
  @endif
  <script>
  const notif = document.getElementById('notif') || null;

  setTimeout(() => {
    notif.style.display = 'none';
  }, 5000);
  </script>
  <main class="uk-container">
    <section class="uk-padding-large">
      <h1>Data Mahasiswa | Rincian Data</h1>
      <hr>
      <section class="uk-overflow-auto">
        <section class="uk-flex uk-flex-middle">
          <a href="{{ route('data-mahasiswa.index') }}" class="uk-icon-button uk-button-primary" uk-icon="chevron-left"></a>
          <p class="uk-padding-remove uk-margin uk-margin-remove-top uk-margin-left uk-margin-remove-bottom uk-margin-remove-right">Kembali</p>
        </section>
      </section>
      <hr>
      <form action="{{ route('data-mahasiswa.update', ['data_mahasiswa' => $matakuliah['id']]) }}" method="POST">
        @csrf
        @method('put')
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
                <td>{{ $matakuliah['kode'] }}</td>
                <td>{{ $matakuliah['nama'] }}</td>
                <td>{{ $matakuliah['sks'] }}</td>
                <td>{{ $matakuliah['kelas'] }}</td>
                <td>{{ $matakuliah['dosen'] }}</td>
              </tr>
          </tbody>
        </table>
      </form>
    </section>
  </main>
@endsection
