<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>GET Request</title>
</head>

<body>
  <div class="container">
    <div>
      <h1><a href="../../index.html" style="color: black;">
          &lt; Back </a>
      </h1>
    </div>

    <h1>Stored XSS in GET Request</h1>
    <form action="" method="GET">
      <input type="text" name="input" required />
      <input type="submit" value="Submit" />
    </form>
    <?php
    $servername = "localhost";
    $username = "ubuntu";
    $password = "Secret_Pass0!";
    $dbname = "db_test";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_GET["input"])) {
      $input = $_GET["input"];
      $sql = "INSERT INTO comments (comment) VALUES ('$input')";

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
      $username = "ubuntu";
      $password = "Secret_Pass0!";
      $dbname = "db_test";

      $conn = mysqli_connect($servername, $username, $password, $dbname);

      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

      $sql = "SELECT comment FROM comments";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo $row['comment'] . "<br>";
        }
      } else {
        echo "0 results";
      }

      mysqli_close($conn);
      ?>
    </div>
  </div>
</body>

</html>
