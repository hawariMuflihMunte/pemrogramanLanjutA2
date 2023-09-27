<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Datadiri</title>
</head>
<body>
  <fieldset style="max-width: 80%; margin: 0 auto;">
    <h1>Datadiri</h1>
    <hr>
    <section>
      <p>
        <span>NIM</span>
        <span>:</span>
        <span>{{ $studentData['nim'] }}</span>
      </p>
      <p>
        <span>Nama</span>
        <span>:</span>
        <span>{{ $studentData['nama'] }}</span>
      </p>
      <p>
        <span>Jurusan</span>
        <span>:</span>
        <span>{{ $studentData['jurusan'] }}</span>
      </p>
      <p>
        <span>Program Studi</span>
        <span>:</span>
        <span>{{ $studentData['programStudi'] }}</span>
      </p>
      <p>
        <span>Mata Kuliah</span>
        <span>:</span>
        <span>{{ $studentData['mataKuliah'] }}</span>
      </p>
      <h4>
        List Mata Kuliah Semester Ganjil 2023/2024
      </h4>
      <ul>
        @foreach ($studentData['mataKuliahSemesterIni'] as $lectures)
          <li>{{ $lectures }}</li>
        @endforeach
      </ul>
    </section>
  </fieldset>
</body>
</html>
