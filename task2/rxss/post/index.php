<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <title>POST Request</title>
</head>

<body>
  <div class="container">
    <div>
      <h1><a href="../../index.html" style="color: black;">
          < Back </a>
      </h1>
    </div>
    <h1>Reflected XSS in POST Request</h1>
    <form action="" method="POST">
      <input type="text" name="input" required />
      <button type="submit">Submit</button>
    </form>
    <div>
      <?php
      if (isset($_POST['input'])) {
        echo "<h1>" . $_POST['input'] . "</h1>";
      }
      ?>
    </div>
  </div>
</body>

</html>
