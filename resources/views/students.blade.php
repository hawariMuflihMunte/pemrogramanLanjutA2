<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Students</title>

  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.1/dist/css/uikit.min.css" />

  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.1/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.1/dist/js/uikit-icons.min.js"></script>
</head>
<body>
  <section class="uk-container">
    <main class="uk-padding-large">
      <h1>Student Data</h1>

      <section class="uk-overflow-auto">
        <section class="uk-flex uk-flex-middle">
          <p class="uk-padding-remove uk-margin uk-margin-remove-top uk-margin-remove-left uk-margin-remove-bottom uk-margin-right">Add Student</p>
          <a href="{{ route('students.create') }}" class="uk-icon-button uk-button-primary" uk-icon="plus"></a>
        </section>

        <table class="uk-table uk-table-small uk-table-striped uk-table-hover uk-table-middle uk-table-center">
          <caption>Student</caption>
          <thead>
              <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Reg. Num</th>
                  <th>Gender</th>
                  <th><span uk-icon="icon: settings"></span></th>
              </tr>
          </thead>
          <tbody>
              @foreach ($students as $key => $data)
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $data['name'] }}</td>
                  <td>{{ $data['reg_num'] }}</td>
                  <td>{{ Str::ucfirst($data['gender']) }}</td>
                  <td class="uk-flex">
                    <a href="{{ route('students.edit', ['student' => $data]) }}" class="uk-icon-button uk-button-default uk-margin uk-margin-remove-top uk-margin-remove-bottom uk-margin-right uk-margin-right-small" uk-icon="pencil"></a>
                    <form action="{{ route('students.destroy', ['student' => $data['id']]) }}" method="post">
                      @csrf
                      @method('delete')
                      <button type="submit" class="uk-icon-button uk-button-danger" uk-icon="trash" onclick="return confirm('Delete data ?')"></button>
                    </form>
                  </td>
                </tr>
              @endforeach
          </tbody>
        </table>
    </main>
    </section>
  </section>
</body>
</html>
