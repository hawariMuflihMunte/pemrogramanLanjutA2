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
      @if(session()->has('message_delete'))
        <div class="uk-alert-danger" uk-alert="duration: 1000" id="deleteNotif">
            <a href class="uk-alert-close" uk-close></a>
            <p>{{ session()->get('message_delete') }}</p>
        </div>

        <script>
          const deleteNotif = document.getElementById('deleteNotif');

          setTimeout(() => {
            deleteNotif.style.display = 'none';
          }, 5000);
        </script>
      @endif
      @if(session()->has('message_create'))
        <div class="uk-alert-success" uk-alert="duration: 1000" id="successNotif">
            <a href class="uk-alert-close" uk-close></a>
            <p>{{ session()->get('message_create') }}</p>
        </div>

        <script>
          const successNotif = document.getElementById('successNotif');

          setTimeout(() => {
            successNotif.style.display = 'none';
          }, 5000);
        </script>
      @endif
        <main class="uk-container">
          <section class="uk-padding-large">
            <h1>Data Mahasiswa</h1>
            <hr>
            <section class="uk-overflow-auto">
              <section class="uk-flex uk-flex-middle">
                <a href="{{ route('data-mahasiswa.create') }}" class="uk-icon-button uk-button-primary" uk-icon="plus"></a>
                <p class="uk-padding-remove uk-margin uk-margin-remove-top uk-margin-left uk-margin-remove-bottom uk-margin-remove-right">Tambah Matakuliah</p>
              </section>
            </section>
            <hr>
            <table class="uk-table uk-table-small uk-table-striped uk-table-hover uk-table-middle uk-table-center">
              <caption>Data matakuliah</caption>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Kode Matakuliah</th>
                  <th>Nama Matakuliah</th>
                  <th>Jumlah SKS</th>
                  <th>Dosen Pengampu</th>
                  <th class="uk-text-center"><span uk-icon="icon: settings"></span></th>
                </tr>
              </thead>
              <tbody>
                @foreach ($matakuliah as $i => $mk)
                  <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $mk['kode'] }}</td>
                    <td>{{ $mk['nama'] }}</td>
                    <td>{{ $mk['sks'] }}</td>
                    <td>{{ $mk['dosen'] }}</td>
                    <td>
                      <section class="uk-flex uk-flex-middle uk-flex-center">
                        <a href="{{ route('data-mahasiswa.edit', ['data_mahasiswa' => $mk]) }}" class="uk-icon-button uk-button-default uk-margin uk-margin-remove-top uk-margin-remove-bottom uk-margin-small-right" uk-icon="pencil" title="{{ "Ubah data ".$mk['nama'] }}"></a>
                        <a href="{{ route('data-mahasiswa.show', ['data_mahasiswa' => $mk]) }}" class="uk-icon-button uk-button-primary uk-margin uk-margin-remove-top uk-margin-remove-bottom uk-margin-small-right" uk-icon="eye" title="{{ "Lihat rincian ".$mk['nama'] }}"></a>
                        <form action="{{ route('data-mahasiswa.destroy', ['data_mahasiswa' => $mk['id']]) }}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="uk-icon-button uk-button-danger" uk-icon="trash" title="{{ "Hapus data ".$mk['nama']."?" }}" onclick="return confirm('Yakin ingin menghapus data ini ?')"></button>
                        </form>
                      </section>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </section>
        </main>
    </body>
</html>
