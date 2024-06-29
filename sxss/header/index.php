<?php
$user_agent = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Stored XSS Header Injection</title>
</head>

<body>
  <div class="container">
    <div>
      <h1><a href="../../index.html" style="color: black;">
          &lt; Back </a>
      </h1>
    </div>
    <h1>Stored Header Injection</h1>
    <h4><?php echo $user_agent; ?> </h4>
    <?php
    $servername = "localhost";
    $username = "ubuntu";
    $password = "Secret_Pass0!";
    $dbname = "xss_db";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if ($user_agent) {
      $insert_query = "INSERT INTO headers (header) VALUES ('$user_agent')";

      if (mysqli_query($conn, $insert_query)) {
        echo "Data inserted success";
      } else {
        echo "Error: " . $conn->error;
      }
    }
    $conn->close();
    ?>
    <div>
      <?php
      $servername = "localhost";
      $username = "ubuntu";
      $password = "Secret_Pass0!";
      $dbname = "xss_db";
      $conn = mysqli_connect($servername, $username, $password, $dbname);

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $select_query = "SELECT header FROM headers ORDER BY header;";
      $result = mysqli_query($conn, $select_query);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo $row['header'] . "<br>";
        }
      }

      echo "mysql closing";
      mysqli_close($conn);
      ?>
    </div>
  </div>
</body>

</html>