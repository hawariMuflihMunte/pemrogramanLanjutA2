<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fruits</title>
</head>
<body>
  <h1>Fruits List</h1>
  <h3>Total Fruits: {{ $totalCount }}</h3>
  <ul>
    @foreach ($fruits as $fruit)
      <li>{{ $fruit }}</li>
    @endforeach
  </ul>
</body>
</html>
