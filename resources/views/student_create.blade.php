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

      <a href="{{ route('students.index') }}" class="uk-icon-button" uk-icon="home"></a>

      <section class="uk-overflow-auto">
        <form action="{{ route('students.store') }}" method="POST">
          @csrf
          <table class="uk-table uk-table-small uk-table-striped uk-table-hover uk-table-middle uk-table-center">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Reg. Num</th>
                    <th>Gender</th>
                    <th><span uk-icon="icon: settings"></span></th>
                </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <input type="text" name="student_name" id="student_name" class="uk-input" autofocus />
                </td>
                <td>
                  <input type="text" name="student_reg_num" id="student_reg_num" class="uk-input" />
                </td>
                <td>
                  <select name="student_gender" id="student_gender" class="uk-select">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                  </select>
                </td>
                <td>
                  <button type="submit" class="uk-icon-button uk-button-primary" uk-icon="check"></button>
                </td>
              </tr>
            </tbody>
          </table>
        </form>
    </main>
    </section>
  </section>
</body>
</html>
