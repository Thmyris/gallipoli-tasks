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
      <h1><a href="../../index.html" style="color: black;">< Back </a></h1>
    </div>
    <h1>Reflected XSS in GET Request</h1>
    <form action="" method="GET">
      <input type="text" name="input" required />
      <input type="submit" value="Submit" />
    </form>
    <div>
      <?php
      if (isset($_GET['input'])) {
        echo "<h1>" . $_GET['input'] . "</h1>";
      }
      ?>
    </div>
  </div>
</body>

</html>