<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>web page table</title>
  </head>
  <body>
    <table>
      <?php
         // Error Reporting: Enable detailed error reporting during development to catch potential issues:
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        function loadEnv($filePath) {
          if (!file_exists($filePath)) {
              throw new Exception('.env file not found');
          }
      
          $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
          foreach ($lines as $line) {
              if (strpos(trim($line), '#') === 0) {
                  // Skip comments
                  continue;
              }
      
              list($name, $value) = explode('=', $line, 2);
      
              $name = trim($name);
              $value = trim($value);
      
              // Set environment variable using putenv() and store it in $_ENV
              putenv("$name=$value");
              $_ENV[$name] = $value;
              // echo "$name=$value\n";
          }
        }
        // echo __DIR__ . '/.env';
        loadEnv("/var/www/html/.env");

        $db_host = getenv('DB_HOST');
        $db_user = getenv('DB_USER');
        $db_password = getenv('DB_PASSWORD');
        $db_name = getenv('DB_NAME');

        // echo $db_host;
        // echo "\n";
        // $type = gettype($db_host);
        // echo "The type of db_host is: " . $type; 
        // echo "\n";
        $con = mysqli_connect("$db_host","$db_user","$db_password","people");
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        } else {
            // echo "Connected successfully";
        }
        $sql = "SELECT id, name, lastname, age FROM register where age >18";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            echo "<table><tr><th>ID</th><th>Name</th><th>Lastname</th><th>Age</th></tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["lastname"]."</td><td>".$row["age"]."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $con->close();
      ?>
    </table>
</body>
</html>

