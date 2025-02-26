<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web Page Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background-color: #f8f9fa;
      }
      .container {
        margin-top: 50px;
      }
      .table-container {
        background: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="table-container">
        <h2 class="text-center mb-4">Registered Users</h2>
        <table class="table table-striped table-hover">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Lastname</th>
              <th>Age</th>
            </tr>
          </thead>
          <tbody>
            <?php
              error_reporting(E_ALL);
              ini_set('display_errors', 1);
              function loadEnv($filePath) {
                if (!file_exists($filePath)) {
                    throw new Exception('.env file not found');
                }
                $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                foreach ($lines as $line) {
                    if (strpos(trim($line), '#') === 0) {
                        continue;
                    }
                    list($name, $value) = explode('=', $line, 2);
                    putenv(trim($name) . '=' . trim($value));
                    $_ENV[trim($name)] = trim($value);
                }
              }
              loadEnv("/var/www/html/.env");
              $db_host = getenv('DB_HOST');
              $db_user = getenv('DB_USER');
              $db_password = getenv('DB_PASSWORD');
              $db_name = getenv('DB_NAME');
              $con = new mysqli($db_host, $db_user, $db_password, "people");
              if ($con->connect_error) {
                  die("<tr><td colspan='4' class='text-danger text-center'>Connection failed: " . $con->connect_error . "</td></tr>");
              }
              $sql = "SELECT id, name, lastname, age FROM register  WHERE age > 23 ";
              $result = $con->query($sql);
              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      echo "<tr><td>" . htmlspecialchars($row["id"]) . "</td><td>" . htmlspecialchars($row["name"]) . "</td><td>" . htmlspecialchars($row["lastname"]) . "</td><td>" . htmlspecialchars($row["age"]) . "</td></tr>";
                  }
              } else {
                  echo "<tr><td colspan='4' class='text-center'>No results found</td></tr>";
              }
              $con->close();
            ?>
          </tbody>
        </table>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
