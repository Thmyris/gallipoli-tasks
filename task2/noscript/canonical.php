<?php
    $param = isset($_GET['param']) ? $_GET['param'] : 'test';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Canonical Link Tag</title>
  <!-- Canonical Link -->
  <?php
    echo "<link rel='canonical' href='http://35.187.63.168/task2/noscript/canonical.php?param=" . $param . "'/>";
  ?>
</head>
<body>
  <div>
    <h1><a href="./index.php" style="color: black;">< Back </a></h1>
  </div>
  <h1>Reflected XSS in Canonical Tag</h1>
</body>
</html>