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
        <li>
          <span>{{ $fruit['fruitName'] }} - ({{ date('m/d/Y',  strtotime($fruit['updated_at'])) }})</span>
          <img src="{{ asset('images/'.$fruit->fruitImage) }}" alt="{{ $fruit['fruitName'] }}" style="
            width: 200px;
            height: auto;
            display: block;
            margin-bottom: 12px;
          ">
          <section style="display: flex; gap: 6px;">
            <a href="{{ route('edit', ['id' => $fruit['id']]) }}" class="button">Edit</a>
            <form action="{{ route('delete') }}" method="post">
              @method('delete')
              @csrf
              <input type="hidden" name="id" value="{{ $fruit->id }}">
              <button type="submit">Hapus</button>
            </form>
          </section>
        </li>
      @endforeach
    </ul>
  </main>
</body>
</html>
