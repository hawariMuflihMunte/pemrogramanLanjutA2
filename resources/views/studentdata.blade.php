<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Datadiri</title>

  <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4.5.1/css/metro-all.min.css">

  <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/skeleton.css') }}">

</head>
<body>
  <main style="max-width: 80%; margin: 0 auto;">
    <h1>Datadiri</h1>
    <fieldset class="border-solid border-size-2 border-radius p-10">
      <section>
        <table>
          <thead>
            <tr></tr>
          </thead>
          <tbody>
            <tr>
              <td>NIM</td>
              <td>:</td>
              <td>{{ $studentData['nim'] }}</td>
            </tr>
            <tr>
              <td>Nama</td>
              <td>:</td>
              <td>{{ $studentData['nama'] }}</td>
            </tr>
            <tr>
              <td>Jurusan</td>
              <td>:</td>
              <td>{{ $studentData['jurusan'] }}</td>
            </tr>
            <tr>
              <td>Program Studi</td>
              <td>:</td>
              <td>{{ $studentData['programStudi'] }}</td>
            </tr>
            <tr>
              <td>Mata Kuliah</td>
              <td>:</td>
              <td>{{ $studentData['mataKuliah'] }}</td>
            </tr>
          </tbody>
        </table>
        <h3>
          List Mata Kuliah Semester Ganjil 2023/2024
        </h3>
        <ul>
          @foreach ($studentData['mataKuliahSemesterIni'] as $lectures)
            <li>{{ $lectures }}</li>
          @endforeach
        </ul>
      </section>
    </fieldset>
  </main>
</body>
</html>
