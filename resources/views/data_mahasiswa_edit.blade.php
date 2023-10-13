<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Data Mahasiswa</title>

        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.1/dist/css/uikit.min.css" />

        <!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.1/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.1/dist/js/uikit-icons.min.js"></script>
    </head>
    <body class="antialiased">
        <main class="uk-container">
          <section class="uk-padding-large">
            <h1>Data Mahasiswa | Ubah Data</h1>
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
                    <th>Dosen Pengampu</th>
                  </tr>
                </thead>
                <tbody>
                    <tr>
                      <td>
                        <input type="text" name="kode" id="kode" class="uk-input" value="{{ $matakuliah['kode'] }}" autofocus>
                      </td>
                      <td>
                        <input type="text" name="nama" id="nama" class="uk-input" value="{{ $matakuliah['nama'] }}">
                      </td>
                      <td>
                        <input type="number" name="sks" id="sks" class="uk-input" value="{{ $matakuliah['sks'] }}" min="1" max="6">
                      </td>
                      <td>
                        <textarea type="text" name="dosen" id="dosen" class="uk-textarea" value="{{ $matakuliah['dosen'] }}" style="resize: vertical">{{ $matakuliah['dosen'] }}</textarea>
                      </td>
                      <td>
                        <button type="submit" class="uk-icon-button uk-button-primary" uk-icon="check" onclick="return confirm('{{ "Ubah data ".$matakuliah['nama']."?" }}')" title="{{ "Ubah data ".$matakuliah['nama']."?" }}"></button>
                      </td>
                    </tr>
                </tbody>
              </table>
            </form>
          </section>
        </main>
    </body>
</html>
