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
    <h1>Fruits</h1>
    <fieldset class="border-solid border-size-2 border-radius p-10">
      <form
        action="{{ route('edit.fruits', ['id' => $fruit['id']]) }}"
        method="POST"
        enctype="multipart/form-data"
      >
        @csrf
        @method('PUT')
        @if($errors->any())
          <div>
              <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
              </ul>
          </div>
        @endif
        <label for="fruit">Fruit Name:</label>
        <input type="text" name="fruitName" id="fruitName" placeholder="...." value="{{ $fruit['fruitName'] }}">
        <section>
          <p>Current Image</p>
          <section>
            <img src="{{ asset('images/'.$fruit['fruitImage']) }}" alt="{{ $fruit['fruitName'] }}">
          </section>
        </section>
        <label for="fruitImage">New Image</label>
        <input type="file" name="fruitImage" id="fruitImage" value="{{ $fruit['fruitImage'] }}">
        <button type="submit" class="button-primary">Save</button>
      </form>
    </fieldset>
  </main>
</body>
</html>
