<?php
  $custom_header = "set";
  header("Custom-Header: $custom_header");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Stored Header Injection</title>
</head>

<body>
  <div class="container">
    <div>
      <h1><a href="../../index.html" style="color: black;">
          &lt; Back </a>
      </h1>
    </div>
    <h1>Stored Header Injection</h1>
    <?php  
    $servername = "localhost";
    $username = "root";
    $password = "Secret_Pass0!";
    $dbname = "db_test";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if ($custom_header != "set") {
      $sql = "INSERT INTO headers (header) VALUES ('$custom_header')";

      if (mysqli_query($conn, $sql)) {
        echo "Success";
      } else {
        echo "Error: " . $conn->error;
      }
    }
    $conn->close();
    ?>
    <div>
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "Secret_Pass0!";
      $dbname = "db_test";

      $conn = mysqli_connect($servername, $username, $password, $dbname);

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT header FROM headers ORDER BY header DESC LIMIT 1;";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        header("Custom-Header: $result");
      } else {
        header("Custom-Header: Not set");
      }

      mysqli_close($conn);
      ?>
    </div>
  </div>
</body>

</html>