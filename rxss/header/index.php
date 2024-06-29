<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Header Injection</title>
</head>

<body>
  <div class="container">
    <div>
      <h1><a href="../../index.html" style="color: black;">< Back </a></h1>
    </div>
    <h1>Header Injection in GET Request</h1>
    <div>
    <form method="GET" action="">
        <label for="input">Girdi: </label>
        <input type="text" id="input" name="input">
        <button type="submit">Gönder</button>
<?php
if (isset($_GET['input'])) {
    $input = $_GET['input'];
    echo $input;
}
?>
    </form>
    </div>
  </div>
</body>

</html>
