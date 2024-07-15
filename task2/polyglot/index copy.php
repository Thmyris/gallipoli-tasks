

<?php
  if (isset($_GET['message'])) {
    $message = htmlspecialchars($_GET["message"]);
    echo "Message: " . $message;
  }
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>Polyglot XSS</title>
</head>

<body>
  <div class="container">
    <div>
      <h1><a href="../index.html" style="color: black;">
          &lt; Back </a>
      </h1>
    </div>

    <h1>Mesajınız:</h1>
    <div><?php echo $message; ?></div>

    <h2>Yeni mesaj girin:</h2>
    <form method="GET">
        <input type="text" name="message" require>
        <input type="submit" value="Submit">
    </form>

    
  </div>
</body>

</html>
