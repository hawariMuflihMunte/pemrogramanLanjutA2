<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fruits</title>

  <link rel="stylesheet" href="https://cdn.korzh.com/metroui/v4.5.1/css/metro-all.min.css">

  <link rel="stylesheet" href="{{ asset('assets/css/normalize.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/skeleton.css') }}">

</head>
<body>
  <main class="p-5 border-solid border-size-1">
    <h1>Fruits List</h1>
    <h3>Total Fruits: {{ $totalCount }}</h3>
    <a class="button" href="{{ route('add') }}">Add Fruits +</a>
    <ul>
      @foreach ($fruits as $fruit)
        <li>{{ $fruit['name'] }} - ({{ date('m/d/Y',  strtotime($fruit['updated_at'])) }})</li>
      @endforeach
    </ul>
  </main>
</body>
</html>
